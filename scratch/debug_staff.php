<?php
$staff = file_get_contents('http://127.0.0.1:8008/staff/kelola-akun');
preg_match_all('/.{0,50}PENGELOLAAN KONTEN.{0,50}/i', $staff, $matches);
print_r($matches[0]);
