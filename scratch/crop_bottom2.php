<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$bottomCrop2 = imagecreatetruecolor(1200, 450);
imagecopy($bottomCrop2, $src, 0, 0, 360, 1400, 1200, 450);
imagepng($bottomCrop2, 'scratch/edit_bottom2.png');
echo "Cropped bottom2\n";
