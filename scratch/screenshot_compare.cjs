const { execFileSync } = require('child_process');
const path = require('path');
const fs = require('fs');

const chrome = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const renders = path.resolve(__dirname, 'renders');
if (!fs.existsSync(renders)) {
    fs.mkdirSync(renders, { recursive: true });
}

const targets = [
    {
        name: 'admin_kelola_akun.png',
        url: 'http://127.0.0.1:8008/admin/kelola-akun',
        width: 1920,
        height: 1200
    },
    {
        name: 'staff_kelola_akun.png',
        url: 'http://127.0.0.1:8008/staff/kelola-akun',
        width: 1920,
        height: 1200
    },
    {
        name: 'admin_galeri_aktivitas.png',
        url: 'http://127.0.0.1:8008/admin/galeri-aktivitas',
        width: 1920,
        height: 1200
    }
];

const tempUserDir = path.join(__dirname, 'temp_chrome_cmp_' + Date.now());

for (const t of targets) {
    const outFile = path.join(renders, t.name);
    console.log(`Taking screenshot for ${t.name}...`);
    try {
        execFileSync(chrome, [
            '--headless=new',
            '--disable-gpu',
            `--user-data-dir=${tempUserDir}`,
            `--window-size=${t.width},${t.height}`,
            `--screenshot=${outFile}`,
            t.url
        ], { timeout: 25000 });
        console.log(`Saved: ${outFile}`);
    } catch (err) {
        console.error(`Failed ${t.name}:`, err.message);
    }
}

try {
    fs.rmSync(tempUserDir, { recursive: true, force: true });
} catch (e) {}

console.log('Comparison screenshots completed!');
