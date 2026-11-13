<?php
$files = [
    'resources/views/admin/kepengurusan.blade.php',
    'resources/views/admin/galeri-aktivitas.blade.php',
    'resources/views/admin/edit-galeri-aktivitas.blade.php',
    'resources/views/admin/prestasi-lidm.blade.php',
    'resources/views/admin/info-kompetisi-nasional.blade.php',
    'resources/views/admin/persyaratan-guidebook.blade.php'
];

foreach ($files as $f) {
    if (file_exists($f)) {
        $c = file_get_contents($f);
        if (strpos($c, "show_content_management") === false) {
            $c = str_replace("@extends('layouts.admin')", "@extends('layouts.admin')\n@section('show_content_management', true)", $c);
            file_put_contents($f, $c);
            echo "Updated $f\n";
        }
    }
}
