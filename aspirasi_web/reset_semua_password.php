<?php
// Tampilkan semua error untuk memastikan tidak ada masalah tersembunyi
error_reporting(E_ALL);
ini_set('display_errors', 1);

// --- PENGATURAN KONEKSI DATABASE ---
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "aspirasi_db";

$koneksi = new mysqli($host, $db_user, $db_pass, $db_name);
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

echo "<h1>Memulai Proses Reset Password...</h1>";

// --- LANGKAH 1: HAPUS TABEL LAMA (untuk memulai dari awal yang bersih) ---
echo "Menghapus tabel lama (users, aspirasi)...<br>";
$koneksi->query("DROP TABLE IF EXISTS aspirasi, users");
echo "Tabel lama berhasil dihapus.<br><hr>";

// --- LANGKAH 2: BUAT ULANG STRUKTUR TABEL ---
echo "Membuat ulang struktur tabel...<br>";
$query_create_users = "
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('mahasiswa', 'dosen') NOT NULL
);";

$query_create_aspirasi = "
CREATE TABLE IF NOT EXISTS aspirasi (
  id_aspirasi INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  jenis VARCHAR(50),
  isi TEXT,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);";

if ($koneksi->query($query_create_users) && $koneksi->query($query_create_aspirasi)) {
    echo "Struktur tabel berhasil dibuat.<br><hr>";
} else {
    die("Gagal membuat tabel: " . $koneksi->error);
}

// --- LANGKAH 3: DATA PENGGUNA (DIAMBIL DARI users_data.sql) ---
// Password di sini adalah NIM atau password default sebelum di-hash
$users_data = [
    ['username' => 'adib', 'password' => '12345678', 'role' => 'dosen'],
    ['username' => 'ahmadkhoiron', 'password' => '23612091189', 'role' => 'mahasiswa'],
    ['username' => 'alfathsuryaputrarurut', 'password' => '23612091988', 'role' => 'mahasiswa'],
    ['username' => 'aliyyazhafiradezmi', 'password' => '23612092003', 'role' => 'mahasiswa'],
    ['username' => 'anjarwibawa', 'password' => '23612091114', 'role' => 'mahasiswa'],
    ['username' => 'arelitaputribudiananda', 'password' => '23612091129', 'role' => 'mahasiswa'],
    ['username' => 'athoriqhamzahmahardiansyah', 'password' => '23612091134', 'role' => 'mahasiswa'],
    ['username' => 'bulansriwahyuniromansyah', 'password' => '23612091080', 'role' => 'mahasiswa'],
    ['username' => 'daftaerlanggaarifin', 'password' => '23612091131', 'role' => 'mahasiswa'],
    ['username' => 'dhendacahyapurnama', 'password' => '23612091023', 'role' => 'mahasiswa'],
    ['username' => 'diansahrulnasution', 'password' => '23612091058', 'role' => 'mahasiswa'],
    ['username' => 'dwirizkibramantio', 'password' => '23612091085', 'role' => 'mahasiswa'],
    ['username' => 'fadilahinsani', 'password' => '23612091128', 'role' => 'mahasiswa'],
    ['username' => 'fakhirazidnianggraeni', 'password' => '23612091030', 'role' => 'mahasiswa'],
    ['username' => 'gheanessashabila', 'password' => '21612091079', 'role' => 'mahasiswa'],
    ['username' => 'gilangali', 'password' => '23612091144', 'role' => 'mahasiswa'],
    ['username' => 'ikhsanramadanputrasupriadi', 'password' => '23612091068', 'role' => 'mahasiswa'],
    ['username' => 'leoauliautroham', 'password' => '23612091054', 'role' => 'mahasiswa'],
    ['username' => 'lilisrahmawatifirdaus', 'password' => '23612091088', 'role' => 'mahasiswa'],
    ['username' => 'mpadu', 'password' => '23612091123', 'role' => 'mahasiswa'],
    ['username' => 'mrezatrilianaakbar', 'password' => '23612091090', 'role' => 'mahasiswa'],
    ['username' => 'mochamadreisalrivanza', 'password' => '23612091210', 'role' => 'mahasiswa'],
    ['username' => 'muhamaddridwan', 'password' => '23612091186', 'role' => 'mahasiswa'],
    ['username' => 'muhammadikmalmaulana', 'password' => '23612091062', 'role' => 'mahasiswa'],
    ['username' => 'muhammadnazlinizzamulsayid', 'password' => '24612092006', 'role' => 'mahasiswa'],
    ['username' => 'nabilaalmasa', 'password' => '23612091124', 'role' => 'mahasiswa'],
    ['username' => 'natanaelsiahaan', 'password' => '23612091053', 'role' => 'mahasiswa'],
    ['username' => 'nazlanurasilah', 'password' => '23612091106', 'role' => 'mahasiswa'],
    ['username' => 'nenengnurfariadah', 'password' => '23612091145', 'role' => 'mahasiswa'],
    ['username' => 'nofalfitranugraha', 'password' => '23612091063', 'role' => 'mahasiswa'],
    ['username' => 'pebiriyani', 'password' => '23612091050', 'role' => 'mahasiswa'],
    ['username' => 'raishaputrialyaagani', 'password' => '23612091097', 'role' => 'mahasiswa'],
    ['username' => 'rickyrudiansyah', 'password' => '23612091133', 'role' => 'mahasiswa'],
    ['username' => 'ridwanabdurrohman', 'password' => '21612091100', 'role' => 'mahasiswa'],
    ['username' => 'rifkiahmadfahrudin', 'password' => '23612091188', 'role' => 'mahasiswa'],
    ['username' => 'rifqikamil', 'password' => '22612091089', 'role' => 'mahasiswa'],
    ['username' => 'salmoniusjosiusramandey', 'password' => '24612092002', 'role' => 'mahasiswa'],
    ['username' => 'selviani', 'password' => '21612091089', 'role' => 'mahasiswa'],
    ['username' => 'sionyehezkielnababan', 'password' => '23612091140', 'role' => 'mahasiswa'],
    ['username' => 'syairaagniatuzzahra', 'password' => '23612091067', 'role' => 'mahasiswa'],
    ['username' => 'syehanahmadzain', 'password' => '23612091015', 'role' => 'mahasiswa'],
    ['username' => 'trendiwijayasantoso', 'password' => '23612091064', 'role' => 'mahasiswa'],
    ['username' => 'taufikhidayat', 'password' => '23612091048', 'role' => 'mahasiswa'],
    ['username' => 'tifannyclarissaputrirohmat', 'password' => '23612091104', 'role' => 'mahasiswa'],
    ['username' => 'vianazutamaningtyas', 'password' => '23612091076', 'role' => 'mahasiswa'],
    ['username' => 'wellisafrinalahagu', 'password' => '23612091040', 'role' => 'mahasiswa'],
    ['username' => 'willyfazrilramadhan', 'password' => '23612091078', 'role' => 'mahasiswa'],
    ['username' => 'yanasuryana', 'password' => '23612091061', 'role' => 'mahasiswa'],
    ['username' => 'yeyensusilawati', 'password' => '21612091043', 'role' => 'mahasiswa']
];

// --- LANGKAH 4: MASUKKAN DATA DENGAN PASSWORD YANG SUDAH DI-HASH ---
echo "Memulai proses hashing dan memasukkan data pengguna...<br>";
$stmt = $koneksi->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");

foreach ($users_data as $user) {
    // Ambil password (NIM) dan hash menggunakan metode yang aman
    $plain_password = $user['password'];
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
    
    // Bind parameter ke statement
    $stmt->bind_param("sss", $user['username'], $hashed_password, $user['role']);
    
    // Eksekusi
    if ($stmt->execute()) {
        echo "Pengguna '<strong>" . htmlspecialchars($user['username']) . "</strong>' berhasil dibuat.<br>";
    } else {
        echo "<strong style='color:red;'>Gagal membuat pengguna '" . htmlspecialchars($user['username']) . "': " . $stmt->error . "</strong><br>";
    }
}

echo "<hr><h2>PROSES SELESAI!</h2>";
echo "Semua akun telah dibuat ulang dengan password yang benar (NIM atau password default).<br>";
echo "Anda sekarang bisa mencoba login dengan akun mahasiswa mana pun menggunakan NIM mereka sebagai password.";

$stmt->close();
$koneksi->close();
?>
