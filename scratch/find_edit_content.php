<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
// Let's check from y = 1400 to 1800, x = 300 to 1250 for any buttons or text
$found = [];
for ($y = 1350; $y < 1780; $y += 5) {
    for ($x = 350; $x < 1200; $x += 5) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        // Non-white and non-transparent
        if ($r < 240 || $g < 240 || $b < 240) {
            $found[floor($y / 20) * 20] = true;
        }
    }
}
ksort($found);
foreach (array_keys($found) as $y) {
    echo "Content at Y: $y\n";
}
