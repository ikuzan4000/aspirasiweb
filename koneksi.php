<?php
// Pengaturan untuk melaporkan semua error PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database menggunakan mysqli
$koneksi = new mysqli("localhost", "root", "", "aspirasi_db");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);

// Di lingkungan production
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/your/php-error.log'); // Tentukan path file log

}
?>