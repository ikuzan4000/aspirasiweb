<?php
session_start();
include 'koneksi.php';

// Cek jika user tidak login atau bukan mahasiswa
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: index.php?error=Anda harus login sebagai mahasiswa");
    exit;
}

// Ambil riwayat aspirasi untuk mahasiswa yang sedang login
$user_id = $_SESSION['user_id'];
$query = "SELECT jenis, isi, tanggal, balasan, tanggal_balasan FROM aspirasi WHERE user_id = ? ORDER BY tanggal DESC";
$stmt_aspirasi = $koneksi->prepare($query);

// === LANGKAH DEBUGGING ===
// Periksa apakah prepare() gagal. Jika ya, tampilkan pesan error dari database.
if ($stmt_aspirasi === false) {
    // Tampilkan pesan error yang spesifik dan hentikan eksekusi
    die("Error preparing statement: " . htmlspecialchars($koneksi->error));
}
// === AKHIR LANGKAH DEBUGGING ===

$stmt_aspirasi->bind_param("i", $user_id);
$stmt_aspirasi->execute();
$aspirasi_result = $stmt_aspirasi->get_result();

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahasiswa - Sistem Aspirasi</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .riwayat-container { margin-top: 40px; }
    .riwayat-list { list-style-type: none; padding: 0; }
    .aspirasi-item { 
        background: #f9f9f9; border: 1px solid #ddd; 
        padding: 15px; margin-bottom: 15px; border-radius: 8px; 
    }
    .aspirasi-meta { font-size: 0.9em; color: #777; }
    .balasan-dosen {
      margin-top: 15px;
      padding: 15px;
      background-color: #e9f7ef;
      border-left: 4px solid #28a745;
      border-radius: 4px;
    }
    .info-sukses { color:green; text-align:center; background-color: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px;}
    .info-error { color:red; text-align:center; background-color: #ffdddd; padding: 10px; border-radius: 5px; margin-bottom: 15px;}
  </style>
</head>
<body>
  <div class="container">
    <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Silakan sampaikan aspirasi Anda melalui form di bawah ini.</p>
    
    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses') echo '<p class="info-sukses">Aspirasi berhasil dikirim!</p>'; ?>
    <?php if (isset($_GET['error'])) echo '<p class="info-error">' . htmlspecialchars($_GET['error']) . '</p>'; ?>

    <form action="proses_aspirasi.php" method="post">
      <select name="jenis" required>
        <option value="" disabled selected>Pilih Kategori Aspirasi</option>
        <option value="Fasilitas">Fasilitas</option>
        <option value="Akademik">Akademik</option>
        <option value="Layanan">Layanan</option>
        <option value="Lainnya">Lainnya</option>
      </select>
      <textarea name="isi" placeholder="Tulis aspirasi Anda di sini..." required></textarea>
      <button type="submit">Kirim Aspirasi</button>
    </form>
    <br>
    
    <!-- Bagian Riwayat Aspirasi -->
    <div class="riwayat-container">
        <h3>Riwayat Aspirasi Anda</h3>
        <?php if ($aspirasi_result->num_rows > 0): ?>
            <ul class="riwayat-list">
            <?php while ($row = $aspirasi_result->fetch_assoc()): ?>
                <li class="aspirasi-item">
                    <strong>Kategori: <?php echo htmlspecialchars($row['jenis']); ?></strong>
                    <p><?php echo nl2br(htmlspecialchars($row['isi'])); ?></p>
                    <em class="aspirasi-meta">Dikirim pada: <?php echo date('d M Y, H:i', strtotime($row['tanggal'])); ?></em>

                    <?php if (!empty($row['balasan'])): ?>
                    <div class="balasan-dosen">
                        <strong>Balasan Dosen:</strong>
                        <p><?php echo nl2br(htmlspecialchars($row['balasan'])); ?></p>
                        <em class="aspirasi-meta">Dibalas pada: <?php echo date('d M Y, H:i', strtotime($row['tanggal_balasan'])); ?></em>
                    </div>
                    <?php else: ?>
                    <div style="margin-top:10px; font-style:italic; color:#888;">Menunggu balasan...</div>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Anda belum pernah mengirimkan aspirasi.</p>
        <?php endif; ?>
    </div>

    <a href="logout.php" class="logout-link">Logout</a>
  </div>
</body>
</html>
