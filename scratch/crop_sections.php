<?php
// Let's crop the title area and top area of Edit Galeri Aktivitas.png
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
// Title is usually at y: 100-300, x: 350-1200
$titleCrop = imagecreatetruecolor(800, 200);
imagecopy($titleCrop, $src, 0, 0, 360, 100, 800, 200);
imagepng($titleCrop, 'scratch/edit_title.png');

// Card header
$cardCrop = imagecreatetruecolor(800, 300);
imagecopy($cardCrop, $src, 0, 0, 360, 240, 800, 300);
imagepng($cardCrop, 'scratch/edit_card_top.png');

// Form fields
$formCrop = imagecreatetruecolor(1000, 600);
imagecopy($formCrop, $src, 0, 0, 360, 500, 1000, 600);
imagepng($formCrop, 'scratch/edit_form_fields.png');

// Bottom buttons
$bottomCrop = imagecreatetruecolor(1000, 400);
imagecopy($bottomCrop, $src, 0, 0, 360, 1200, 1000, 400);
imagepng($bottomCrop, 'scratch/edit_bottom.png');

echo "Cropped ok\n";
