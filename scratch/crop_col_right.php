<?php
// Let's check what's on the right half of Edit Galeri Aktivitas.png (x: 1000 to 1850)
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Crop right side (x: 1050 to 1850, y: 150 to 1500)
$rightCrop = imagecreatetruecolor(800, 1300);
imagecopy($rightCrop, $src, 0, 0, 1050, 150, 800, 1300);
imagepng($rightCrop, 'scratch/edit_col_right.png');
echo "Cropped col right\n";
