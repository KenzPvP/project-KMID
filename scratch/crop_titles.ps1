Add-Type -AssemblyName System.Drawing

$imgPath = 'C:\Users\ASUS\.gemini\antigravity\brain\446c1fca-b512-48f9-9b1a-e554e8e24a33\.user_uploaded\media_1790834456025.png'
$bmp = [System.Drawing.Bitmap]::FromFile($imgPath)
$w = $bmp.Width
$h = $bmp.Height

function Crop-Rect($x, $y, $cw, $ch, $name) {
    $rect = New-Object System.Drawing.Rectangle($x, $y, $cw, $ch)
    $cropped = $bmp.Clone($rect, $bmp.PixelFormat)
    $outPath = "c:\laragon\www\project-kmid\scratch\renders\$name.png"
    $cropped.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
    $cropped.Dispose()
    Write-Host "Saved $outPath ($cw x $ch)"
}

# Sejarah KMID is around y=355, center, width ~120, height ~30
Crop-Rect 100 350 115 35 'title_sejarah'

# Visi & Misi is around y=530, center, width ~90, height ~30
Crop-Rect 120 535 75 30 'title_visi_misi'

# Struktur Kepengurusan is around y=650, center, width ~160, height ~30
Crop-Rect 90 655 135 30 'title_struktur'

$bmp.Dispose()
