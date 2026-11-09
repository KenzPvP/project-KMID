<?php
// Let's inspect where buttons or text are in Edit Galeri Aktivitas.png
// Let's crop x: 280 to 1300, y: 140 to 1750 and save as scratch/edit_full_card.jpg
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$crop = imagecreatetruecolor(1020, 1600);
imagecopyresampled($crop, $src, 0, 0, 280, 140, 1020, 1600, 1020, 1600);
imagejpeg($crop, 'scratch/edit_full_card.jpg', 90);
echo "Full edit card saved to scratch/edit_full_card.jpg\n";
