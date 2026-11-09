Add-Type -AssemblyName System.Drawing

$pngPath = 'c:\laragon\www\project-kmid\scratch\activities_renders\live_activities_full.png'
$bmp = [System.Drawing.Bitmap]::FromFile($pngPath)
$w = $bmp.Width
$h = $bmp.Height
Write-Host "Live activities resolution: $w x $h"

function Crop-Image($yStartPct, $yEndPct, $name) {
    $y1 = [int]($h * $yStartPct)
    $y2 = [int]($h * $yEndPct)
    $cropH = $y2 - $y1
    $rect = New-Object System.Drawing.Rectangle(0, $y1, $w, $cropH)
    $cropped = $bmp.Clone($rect, $bmp.PixelFormat)
    $outPath = "c:\laragon\www\project-kmid\scratch\activities_renders\$name.png"
    $cropped.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
    $cropped.Dispose()
    Write-Host "Saved $outPath ($w x $cropH)"
}

Crop-Image 0.00 0.22 'live_1_hero'
Crop-Image 0.20 0.46 'live_2_programs_grid'
Crop-Image 0.44 0.66 'live_3_blue_calendar'
Crop-Image 0.65 0.90 'live_4_gallery'
Crop-Image 0.89 1.00 'live_5_footer'

$bmp.Dispose()
