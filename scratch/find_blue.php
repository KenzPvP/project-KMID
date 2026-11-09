<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Let's find any blue buttons (R around 0, G around 74, B around 218)
$bluePixels = [];
for ($y = 0; $y < $h; $y += 5) {
    for ($x = 300; $x < $w; $x += 5) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        if ($r < 30 && $g > 60 && $g < 90 && $b > 200) {
            $bluePixels[] = [$x, $y];
        }
    }
}

// Group into y ranges
$yRanges = [];
foreach ($bluePixels as $p) {
    $yr = floor($p[1] / 50) * 50;
    if (!isset($yRanges[$yr])) $yRanges[$yr] = [];
    $yRanges[$yr][] = $p[0];
}

foreach ($yRanges as $yr => $xs) {
    echo "Y: $yr to " . ($yr + 50) . " has " . count($xs) . " blue pixels, X range: " . min($xs) . " to " . max($xs) . "\n";
}
