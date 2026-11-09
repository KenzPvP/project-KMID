Add-Type -AssemblyName System.Drawing

$pngPath = 'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\Activities.png'
$bmp = [System.Drawing.Bitmap]::FromFile($pngPath)
$w = $bmp.Width
$h = $bmp.Height
Write-Host "Activities.png resolution: $w x $h"

os.makedirs -Path 'c:\laragon\www\project-kmid\scratch\activities_renders' -Force

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

New-Item -ItemType Directory -Force -Path 'c:\laragon\www\project-kmid\scratch\activities_renders' | Out-Null

Crop-Image 0.00 0.20 'act_1_hero'
Crop-Image 0.18 0.45 'act_2_programs_grid'
Crop-Image 0.43 0.65 'act_3_blue_calendar'
Crop-Image 0.64 0.90 'act_4_gallery'
Crop-Image 0.89 1.00 'act_5_footer'

$bmp.Dispose()
