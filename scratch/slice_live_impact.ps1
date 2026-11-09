Add-Type -AssemblyName System.Drawing

$pngPath = 'c:\laragon\www\project-kmid\scratch\impact_renders\live_impact_full.png'
$bmp = [System.Drawing.Bitmap]::FromFile($pngPath)
$w = $bmp.Width
$h = $bmp.Height
Write-Host "Live impact resolution: $w x $h"

$outDir = 'c:\laragon\www\project-kmid\scratch\impact_renders'

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

Crop-Image 0.00 0.23 'live_imp_1_hero'
Crop-Image 0.21 0.44 'live_imp_2_blue'
Crop-Image 0.42 0.70 'live_imp_3_prestasi'
Crop-Image 0.68 0.86 'live_imp_4_partnership'
Crop-Image 0.84 1.00 'live_imp_5_footer'

$bmp.Dispose()
