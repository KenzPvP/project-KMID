<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
// Let's crop y: 1500 to 1800, x: 300 to 1300
$crop = imagecreatetruecolor(1000, 300);
imagecopy($crop, $src, 0, 0, 300, 1500, 1000, 300);
imagepng($crop, 'scratch/edit_card_footer.png');
echo "Cropped edit_card_footer.png\n";
