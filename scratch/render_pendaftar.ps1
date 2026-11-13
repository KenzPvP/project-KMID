$chromePath = 'C:\Program Files\Google\Chrome\Application\chrome.exe'
$outDir = 'scratch/renders'
if (-not (Test-Path $outDir)) { New-Item -ItemType Directory -Path $outDir -Force | Out-Null }

$p1 = "$outDir/kelola_akun.png"
$p2 = "$outDir/detail_pendaftar.png"

Write-Output "Rendering kelola akun..."
& $chromePath --headless=new --disable-gpu --window-size=1920,1200 --screenshot="$p1" "http://127.0.0.1:8008/admin/kelola-akun"

Write-Output "Rendering detail pendaftar..."
& $chromePath --headless=new --disable-gpu --window-size=1920,1400 --screenshot="$p2" "http://127.0.0.1:8008/admin/kelola-akun/detail"

Write-Output "Done rendering."
Get-ChildItem $p1, $p2 | Select-Object Name, Length
