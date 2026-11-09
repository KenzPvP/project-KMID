<?php
// Let's crop Edit Galeri Aktivitas into chunks to inspect its contents
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Let's crop top part (x: 300 to 1800, y: 0 to 1200)
$dest1 = imagecreatetruecolor(1200, 1000);
imagecopyresampled($dest1, $src, 0, 0, 300, 0, 1200, 1000, 1500, 1250);
imagepng($dest1, 'scratch/edit_chunk1.png');

echo "Saved chunk1\n";
