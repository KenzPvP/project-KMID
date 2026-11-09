<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
// Check top right of heading
$crop = imagecreatetruecolor(800, 200);
imagecopy($crop, $src, 0, 0, 1000, 150, 800, 200);
imagepng($crop, 'scratch/edit_header_right.png');
echo "Cropped edit_header_right.png\n";
