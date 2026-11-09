<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
// Let's crop from x: 1250 to 1850, y: 200 to 1600
$w = 1850 - 1250;
$h = 1600 - 200;
$crop = imagecreatetruecolor($w, $h);
imagecopy($crop, $src, 0, 0, 1250, 200, $w, $h);
imagepng($crop, 'scratch/edit_side_card.png');
echo "Cropped side card: {$w}x{$h}\n";
