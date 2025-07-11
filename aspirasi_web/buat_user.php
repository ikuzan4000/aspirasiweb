<?php
// Menambahkan baris ini untuk memaksa PHP menampilkan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ============== PENGATURAN ==============
// Ganti password di bawah ini dengan password yang Anda inginkan untuk akun admin.
// Jaga agar password ini mudah diingat untuk sementara waktu.
$passwordUntukAdmin = 'admin123';
// ==========================================

// Menggunakan fungsi password_hash() untuk membuat hash yang aman.
// PASSWORD_DEFAULT adalah algoritma hashing terkuat yang tersedia di versi PHP Anda.
$hash = password_hash($passwordUntukAdmin, PASSWORD_DEFAULT);

// Menampilkan hasil hash ke layar agar bisa disalin.
// Diberi style agar mudah dibaca dan dipilih.
echo '<div style="font-family: monospace; font-size: 1.2em; padding: 20px; background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 5px;">';
echo '<strong>Password Anda:</strong><br>' . htmlspecialchars($passwordUntukAdmin) . '<br><br>';
echo '<strong>Salin Hash di Bawah Ini:</strong><br>';
echo '<textarea rows="3" style="width: 100%; font-size: 1em; margin-top: 10px;" readonly>' . htmlspecialchars($hash) . '</textarea>';
echo '</div>';

?>
