<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Let's sample colors in x: 1300 to 1800, y: 200 to 1500
$colors = [];
for ($y = 200; $y < 1500; $y += 20) {
    for ($x = 1300; $x < 1850; $x += 20) {
        $rgb = imagecolorat($src, $x, $y);
        $hex = sprintf('#%02x%02x%02x', ($rgb >> 16) & 0xFF, ($rgb >> 8) & 0xFF, $rgb & 0xFF);
        $colors[$hex] = ($colors[$hex] ?? 0) + 1;
    }
}
arsort($colors);
print_r(array_slice($colors, 0, 10));
