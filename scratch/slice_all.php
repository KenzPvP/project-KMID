<?php
// Scan from top to bottom
$src = imagecreatefrompng('public/images/desainKMID/admin/Edit Galeri Aktivitas.png');
$w = imagesx($src);
$h = imagesy($src);

// Let's crop into 4 vertical slices of 500px height each, width 1400 (x: 250 to 1650)
for ($i = 0; $i < 4; $i++) {
    $y = $i * 450;
    $sliceH = min(500, $h - $y);
    if ($sliceH <= 0) break;
    $crop = imagecreatetruecolor(1400, $sliceH);
    imagecopy($crop, $src, 0, 0, 250, $y, 1400, $sliceH);
    imagepng($crop, "scratch/slice_full_$i.png");
}
echo "Full slices created\n";
