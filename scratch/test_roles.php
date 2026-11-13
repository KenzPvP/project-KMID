<?php
$admin = file_get_contents('http://127.0.0.1:8008/admin/kelola-akun');
$staff = file_get_contents('http://127.0.0.1:8008/staff/kelola-akun');

echo "Admin has Kepengurusan: " . (strpos($admin, 'Kepengurusan') !== false ? 'YES' : 'NO') . "\n";
echo "Staff has Kepengurusan: " . (strpos($staff, 'Kepengurusan') !== false ? 'YES' : 'NO') . "\n";
echo "Admin has Galeri Aktivitas: " . (strpos($admin, 'Galeri Aktivitas') !== false ? 'YES' : 'NO') . "\n";
echo "Staff has Galeri Aktivitas: " . (strpos($staff, 'Galeri Aktivitas') !== false ? 'YES' : 'NO') . "\n";
echo "Admin has Prestasi LIDM: " . (strpos($admin, 'Prestasi LIDM') !== false ? 'YES' : 'NO') . "\n";
echo "Staff has Prestasi LIDM: " . (strpos($staff, 'Prestasi LIDM') !== false ? 'YES' : 'NO') . "\n";
echo "Admin has Kelola Akun: " . (strpos($admin, 'Kelola Akun') !== false ? 'YES' : 'NO') . "\n";
echo "Staff has Kelola Akun: " . (strpos($staff, 'Kelola Akun') !== false ? 'YES' : 'NO') . "\n";
