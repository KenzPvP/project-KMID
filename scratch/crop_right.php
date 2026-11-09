<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
// Let's crop x: 1200 to 1850, y: 150 to 900
$cropRight = imagecreatetruecolor(650, 750);
imagecopy($cropRight, $src, 0, 0, 1200, 150, 650, 750);
imagepng($cropRight, 'scratch/edit_card_right.png');
echo "Cropped right\n";
