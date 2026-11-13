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
        name: 'kelola_akun.png',
        url: 'http://127.0.0.1:8008/admin/kelola-akun',
        width: 1920,
        height: 1200
    },
    {
        name: 'detail_pendaftar.png',
        url: 'http://127.0.0.1:8008/admin/kelola-akun/detail',
        width: 1920,
        height: 1500
    }
];

const tempUserDir = path.join(__dirname, 'temp_chrome');

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
        ], { timeout: 20000 });
        console.log(`Saved: ${outFile}`);
    } catch (err) {
        console.error(`Failed ${t.name}:`, err.message);
    }
}

try {
    fs.rmSync(tempUserDir, { recursive: true, force: true });
} catch (e) {}

console.log('Done!');
