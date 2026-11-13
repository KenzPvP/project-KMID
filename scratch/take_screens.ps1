$chrome = 'C:\Program Files\Google\Chrome\Application\chrome.exe'
$dir = (Resolve-Path 'scratch').Path
$out1 = Join-Path $dir 'screen_kelola.png'
$out2 = Join-Path $dir 'screen_detail.png'

Write-Host "Rendering 1..."
& $chrome --headless=new --disable-gpu --window-size=1920,1200 "--screenshot=$out1" "http://127.0.0.1:8008/admin/kelola-akun"
Start-Sleep -Seconds 2

Write-Host "Rendering 2..."
& $chrome --headless=new --disable-gpu --window-size=1920,1500 "--screenshot=$out2" "http://127.0.0.1:8008/admin/kelola-akun/detail"
Start-Sleep -Seconds 2

Test-Path $out1, $out2
Get-Item $out1, $out2 | Select-Object Name, Length
