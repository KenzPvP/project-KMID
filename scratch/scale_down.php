<?php
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Scale down by 4x to analyze visually
$small = imagecreatetruecolor($w / 4, $h / 4);
imagecopyresampled($small, $src, 0, 0, 0, 0, $w / 4, $h / 4, $w, $h);
imagepng($small, 'scratch/edit_small.png');

echo "Small preview created: " . ($w/4) . "x" . ($h/4) . "\n";
