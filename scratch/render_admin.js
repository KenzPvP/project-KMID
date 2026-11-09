const { execSync } = require('child_process');
const path = require('path');
const fs = require('fs');

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const outDir = path.resolve(__dirname, 'renders');
if (!fs.existsSync(outDir)) {
    fs.mkdirSync(outDir, { recursive: true });
}

const pages = [
    { name: 'admin_galeri', url: 'http://127.0.0.1:8008/admin/galeri-aktivitas' },
    { name: 'admin_edit_galeri', url: 'http://127.0.0.1:8008/admin/galeri-aktivitas/edit' },
    { name: 'admin_prestasi', url: 'http://127.0.0.1:8008/admin/prestasi-lidm' },
    { name: 'admin_kompetisi', url: 'http://127.0.0.1:8008/admin/info-kompetisi' },
    { name: 'admin_kepengurusan', url: 'http://127.0.0.1:8008/admin/kepengurusan' },
    { name: 'admin_persyaratan', url: 'http://127.0.0.1:8008/admin/persyaratan-guidebook' }
];

for (const p of pages) {
    const out = path.join(outDir, `${p.name}.png`);
    const cmd = `"${chromePath}" --headless=new --disable-gpu --window-size=1920,1200 --screenshot="${out}" "${p.url}"`;
    console.log(`Rendering ${p.name}...`);
    try {
        execSync(cmd, { timeout: 15000 });
        console.log(`Saved: ${out}`);
    } catch (e) {
        console.error(`Error rendering ${p.name}:`, e.message);
    }
}
