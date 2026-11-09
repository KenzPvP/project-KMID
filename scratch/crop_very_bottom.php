<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$crop = imagecreatetruecolor(900, 200);
imagecopy($crop, $src, 0, 0, 320, 1650, 900, 200);
imagepng($crop, 'scratch/edit_card_very_bottom.png');
