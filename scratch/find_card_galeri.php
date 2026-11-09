<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Admin Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Check card width in Admin Galeri Aktivitas.png
$minX = $w; $maxX = 0;
for ($y = 400; $y < 600; $y += 10) {
    for ($x = 300; $x < $w; $x += 10) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        if ($r == 255 && $g == 255 && $b == 255) {
            $minX = min($minX, $x);
            $maxX = max($maxX, $x);
        }
    }
}
echo "Admin Galeri Aktivitas Card X: $minX to $maxX, width: " . ($maxX - $minX) . "\n";
