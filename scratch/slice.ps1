Add-Type -AssemblyName System.Drawing

# 1. Extract base64 image from About.svg
$svgContent = [System.IO.File]::ReadAllText('c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\About.svg')
if ($svgContent -match 'xlink:href="data:image/([^;]+);base64,([^"]+)"') {
    $ext = $matches[1]
    $bytes = [System.Convert]::FromBase64String($matches[2])
    $outHero = "c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\about_hero_building.$ext"
    [System.IO.File]::WriteAllBytes($outHero, $bytes)
    Write-Host "Extracted building image: about_hero_building.$ext (Length: $($bytes.Length))"
}

# 2. Slice user image
$imgPath = 'C:\Users\ASUS\.gemini\antigravity\brain\446c1fca-b512-48f9-9b1a-e554e8e24a33\.user_uploaded\media_1790834456025.png'
$bmp = [System.Drawing.Bitmap]::FromFile($imgPath)
$w = $bmp.Width
$h = $bmp.Height
Write-Host "User image resolution: $w x $h"

function Crop-Image($yStartPct, $yEndPct, $name) {
    $y1 = [int]($h * $yStartPct)
    $y2 = [int]($h * $yEndPct)
    $cropH = $y2 - $y1
    $rect = New-Object System.Drawing.Rectangle(0, $y1, $w, $cropH)
    $cropped = $bmp.Clone($rect, $bmp.PixelFormat)
    $outPath = "c:\laragon\www\project-kmid\scratch\renders\$name.png"
    $cropped.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
    $cropped.Dispose()
    Write-Host "Saved $outPath ($w x $cropH)"
}

Crop-Image 0.00 0.17 'crop1_hero'
Crop-Image 0.16 0.34 'crop2_riset'
Crop-Image 0.33 0.52 'crop3_sejarah'
Crop-Image 0.51 0.65 'crop4_visi_misi'
Crop-Image 0.64 0.81 'crop5_bph'
Crop-Image 0.80 0.92 'crop6_kadiv'
Crop-Image 0.91 1.00 'crop7_footer'

$bmp.Dispose()
