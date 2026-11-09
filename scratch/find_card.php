<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Let's check row y = 600 across x from 300 to 1900 to see where the white card starts and ends
for ($x = 280; $x < 1900; $x += 10) {
    $rgb = imagecolorat($src, $x, 600);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;
    // Print when color changes significantly from background (~251, 251, 250) to card (255, 255, 255)
    // Actually let's check borders
}

// Let's find white card bounding box
$minX = $w; $maxX = 0; $minY = $h; $maxY = 0;
for ($y = 150; $y < $h - 100; $y += 10) {
    for ($x = 300; $x < $w; $x += 10) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        if ($r == 255 && $g == 255 && $b == 255) {
            $minX = min($minX, $x);
            $maxX = max($maxX, $x);
            $minY = min($minY, $y);
            $maxY = max($maxY, $y);
        }
    }
}
echo "White area: X: $minX to $maxX (width: " . ($maxX - $minX) . "), Y: $minY to $maxY (height: " . ($maxY - $minY) . ")\n";
