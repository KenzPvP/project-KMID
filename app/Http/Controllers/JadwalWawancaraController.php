<?php

namespace App\Http\Controllers;

use App\Models\JadwalWawancara;
use App\Models\Pendaftar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalWawancaraController extends Controller
{
    /**
     * Tampilkan daftar seluruh jadwal wawancara beserta filter.
     */
    public function index(Request $request)
    {
        $query = JadwalWawancara::with('pendaftar');

        // Filter Tanggal
        if ($filterTanggal = $request->input('tanggal')) {
            if ($filterTanggal !== 'Semua tanggal') {
                $query->whereDate('tanggal', $filterTanggal);
            }
        }

        // Filter Pewawancara
        if ($filterPewawancara = $request->input('pewawancara')) {
            if ($filterPewawancara !== 'Semua pewawancara') {
                $query->where('pewawancara', 'like', "%{$filterPewawancara}%");
            }
        }

        // Filter Status Slot
        if ($filterStatus = $request->input('status')) {
            if ($filterStatus !== 'Semua status') {
                $query->where('status', $filterStatus);
            }
        }

        $allJadwals = (clone $query)->orderBy('tanggal', 'asc')->orderBy('jam_mulai', 'asc')->get();

        // Kelompokkan berdasarkan tanggal
        $groupedJadwals = $allJadwals->groupBy(function ($item) {
            return $item->tanggal ? $item->tanggal->format('Y-m-d') : 'unknown';
        });

        // Data untuk dropdown filter
        $availableDates = JadwalWawancara::select('tanggal')
            ->distinct()
            ->orderBy('tanggal', 'asc')
            ->pluck('tanggal');

        $availableInterviewers = JadwalWawancara::select('pewawancara')
            ->distinct()
            ->orderBy('pewawancara', 'asc')
            ->pluck('pewawancara');

        // Metrik
        $totalSlots = JadwalWawancara::count();
        $availableSlots = JadwalWawancara::where('status', 'Tersedia')->count();
        $filledSlots = JadwalWawancara::where('status', 'Terisi')->count();
        $canceledSlots = JadwalWawancara::where('status', 'Dibatalkan')->count();

        // Pendaftar yang lolos berkas untuk modal assign
        $pendaftarsLolosBerkas = Pendaftar::whereIn('status', ['Lolos Berkas', 'Lolos Wawancara'])
            ->whereNull('interview_time')
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.jadwal-wawancara', compact(
            'groupedJadwals',
            'allJadwals',
            'availableDates',
            'availableInterviewers',
            'totalSlots',
            'availableSlots',
            'filledSlots',
            'canceledSlots',
            'pendaftarsLolosBerkas'
        ));
    }

    /**
     * Tampilkan form pembuatan / generate jadwal baru.
     */
    public function create()
    {
        return view('admin.tambah-jadwal');
    }

    /**
     * Simpan kumpulan slot wawancara hasil generate ke database.
     */
    public function store(Request $request)
    {
        $slots = [];

        if ($request->filled('slots_json')) {
            $decoded = json_decode($request->slots_json, true);
            if (is_array($decoded)) {
                $slots = $decoded;
            }
        } elseif ($request->has('slots') && is_array($request->slots)) {
            $slots = $request->slots;
        }

        if (empty($slots)) {
            return back()->withInput()->withErrors([
                'slots' => 'Belum ada slot wawancara yang digenerate. Silakan klik tombol "Generate slot otomatis" terlebih dahulu.',
            ]);
        }

        $createdCount = 0;
        $firstDate = null;

        foreach ($slots as $slot) {
            if (empty($slot['tanggal']) || empty($slot['jam_mulai']) || empty($slot['jam_selesai'])) {
                continue;
            }

            if (!$firstDate) {
                $firstDate = $slot['tanggal'];
            }

            JadwalWawancara::create([
                'tanggal' => $slot['tanggal'],
                'jam_mulai' => $slot['jam_mulai'],
                'jam_selesai' => $slot['jam_selesai'],
                'pewawancara' => $slot['pewawancara'] ?? 'Tim Wawancara KMID',
                'durasi_menit' => (int) ($slot['durasi_menit'] ?? 15),
                'kuota' => (int) ($slot['kuota'] ?? 1),
                'mode' => $slot['mode'] ?? 'Offline',
                'lokasi' => $slot['lokasi'] ?? 'Ruang Diskusi KMID',
                'status' => 'Tersedia',
            ]);

            $createdCount++;
        }

        $isStaff = $request->is('staff*');
        $redirectRoute = $isStaff ? 'staff.pendaftar.wawancara' : 'admin.pendaftar.wawancara';
        $formattedDate = $firstDate ? Carbon::parse($firstDate)->locale('id')->isoFormat('D MMMM Y') : 'yang dipilih';

        return redirect()->route($redirectRoute)->with(
            'success',
            "Berhasil menyimpan {$createdCount} slot jadwal wawancara untuk tanggal {$formattedDate}!"
        );
    }

    /**
     * Hapus satu slot jadwal wawancara.
     */
    public function destroy(Request $request, JadwalWawancara $jadwal)
    {
        if ($jadwal->pendaftar_id) {
            $pendaftar = Pendaftar::find($jadwal->pendaftar_id);
            if ($pendaftar) {
                $pendaftar->update([
                    'interview_date' => null,
                    'interview_time' => null,
                ]);
            }
        }

        $jadwal->delete();

        return back()->with('success', 'Slot jadwal wawancara berhasil dihapus.');
    }

    /**
     * Tugaskan / jadwalkan pendaftar ke slot tertentu dari modal.
     */
    public function assignPendaftar(Request $request, JadwalWawancara $jadwal)
    {
        $request->validate([
            'pendaftar_id' => ['required', 'exists:pendaftars,id'],
        ]);

        $pendaftar = Pendaftar::findOrFail($request->pendaftar_id);

        $jadwal->update([
            'pendaftar_id' => $pendaftar->id,
            'status' => 'Terisi',
        ]);

        $pendaftar->update([
            'interview_date' => $jadwal->tanggal_pendek,
            'interview_time' => $jadwal->jam_range,
        ]);

        return back()->with('success', "Pendaftar {$pendaftar->name} berhasil dijadwalkan pada sesi {$jadwal->jam_range}!");
    }
}
