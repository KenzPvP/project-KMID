Add-Type -AssemblyName System.Drawing

$imgPath = 'C:\Users\ASUS\.gemini\antigravity\brain\446c1fca-b512-48f9-9b1a-e554e8e24a33\.user_uploaded\media_1792675711148_6249dd81.png'
$bmp = [System.Drawing.Bitmap]::FromFile($imgPath)
$w = $bmp.Width
$h = $bmp.Height
Write-Host "Impact uploaded image resolution: $w x $h"

$outDir = 'c:\laragon\www\project-kmid\scratch\impact_renders'
if (!(Test-Path $outDir)) {
    New-Item -ItemType Directory -Force -Path $outDir | Out-Null
}

function Crop-Image($yStartPct, $yEndPct, $name) {
    $y1 = [int]($h * $yStartPct)
    $y2 = [int]($h * $yEndPct)
    $cropH = $y2 - $y1
    $rect = New-Object System.Drawing.Rectangle(0, $y1, $w, $cropH)
    $cropped = $bmp.Clone($rect, $bmp.PixelFormat)
    $outPath = "$outDir\$name.png"
    $cropped.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
    $cropped.Dispose()
    Write-Host "Saved $outPath ($w x $cropH)"
}

# Crop into 5 sections
Crop-Image 0.00 0.24 'imp_1_hero'
Crop-Image 0.22 0.46 'imp_2_blue_pusat'
Crop-Image 0.44 0.72 'imp_3_prestasi_lidm'
Crop-Image 0.70 0.88 'imp_4_partnership'
Crop-Image 0.86 1.00 'imp_5_footer'

$bmp.Dispose()
