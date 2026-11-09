<?php
// Let's inspect Edit Galeri Aktivitas.png
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Let's slice the card area (x: 350 to 1800, y: 150 to 1750) into 3 vertical parts
$cardW = 1450;
$h1 = 600;

for ($i = 0; $i < 3; $i++) {
    $dest = imagecreatetruecolor(900, 500);
    imagecopyresampled($dest, $src, 0, 0, 380, 180 + ($i * 450), 900, 500, 1400, 500);
    imagepng($dest, "scratch/edit_slice_{$i}.png");
}
echo "Slices created\n";
