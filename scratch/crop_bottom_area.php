<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$crop = imagecreatetruecolor(900, 280);
imagecopy($crop, $src, 0, 0, 320, 1500, 900, 280);
imagepng($crop, 'scratch/edit_bottom_area.png');
echo "Saved edit_bottom_area.png\n";
