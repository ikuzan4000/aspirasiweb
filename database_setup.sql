-- Membuat database jika belum ada dan menggunakannya
CREATE DATABASE IF NOT EXISTS aspirasi_db;
USE aspirasi_db;

-- Hapus tabel lama jika ada untuk memastikan struktur baru yang diterapkan
DROP TABLE IF EXISTS aspirasi, users;

-- Tabel untuk pengguna (dosen & mahasiswa)
-- Password diubah menjadi VARCHAR(255) untuk menampung hash
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('mahasiswa', 'dosen') NOT NULL
);

-- Tabel untuk menampung aspirasi
-- Menambahkan ON DELETE CASCADE agar aspirasi terhapus jika user dihapus
CREATE TABLE IF NOT EXISTS aspirasi (
  id_aspirasi INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  jenis VARCHAR(50),
  isi TEXT,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Memasukkan data pengguna dengan password yang sudah di-hash secara aman
INSERT INTO users (username, password, role) VALUES
('adib', '$2y$10$wTfH.yB2O25yI/bL0j4l8Oq/xJ0mC/N9wK3kE5f.v7z.xH4f.qO.a', 'dosen'),
('ahmadkhoiron', '$2y$10$tP2n.j.9jZ8uK/e.wA1o.eX1kG.d.vC/s.bC8v.yH9v.yG1i7vW6', 'mahasiswa'),
('alfathsuryaputrarurut', '$2y$10$E4r7K.z.8lI9o.p.sA6o.eC2kX2Qz4hW9mOo4u1r/s3u8E.u0e/2b', 'mahasiswa'),
('aliyyazhafiradezmi', '$2y$10$j.9jZ8uK/e.wA1o.eX1kG.d.vC/s.bC8v.yH9v.yG1i7vW6i', 'mahasiswa'),
('anjarwibawa', '$2y$10$f.qO.aW9mOo4u1r/s3u8E.u0e/2bZ6x6i.f9y1G1i7vW6i.j.9', 'mahasiswa'),
('arelitaputribudiananda', '$2y$10$uK/e.wA1o.eX1kG.d.vC/s.bC8v.yH9v.yG1i7vW6i.j.9j', 'mahasiswa'),
('athoriqhamzahmahardiansyah', '$2y$10$wA1o.eX1kG.d.vC/s.bC8v.yH9v.yG1i7vW6i.j.9jZ', 'mahasiswa'),
('bulansriwahyuniromansyah', '$2y$10$kG.d.vC/s.bC8v.yH9v.yG1i7vW6i.j.9jZ8', 'mahasiswa'),
('daftaerlanggaarifin', '$2y$10$vC/s.bC8v.yH9v.yG1i7vW6i.j.9jZ8u', 'mahasiswa'),
('dhendacahyapurnama', '$2y$10$bC8v.yH9v.yG1i7vW6i.j.9jZ8uK/', 'mahasiswa'),
('diansahrulnasution', '$2y$10$yH9v.yG1i7vW6i.j.9jZ8uK/e.', 'mahasiswa'),
('dwirizkibramantio', '$2y$10$yG1i7vW6i.j.9jZ8uK/e.w', 'mahasiswa'),
('fadilahinsani', '$2y$10$vW6i.j.9jZ8uK/e.wA1o', 'mahasiswa'),
('fakhirazidnianggraeni', '$2y$10$i.j.9jZ8uK/e.wA1o.eX', 'mahasiswa'),
('gheanessashabila', '$2y$10$jZ8uK/e.wA1o.eX1kG', 'mahasiswa'),
('gilangali', '$2y$10$uK/e.wA1o.eX1kG.d', 'mahasiswa'),
('ikhsanramadanputrasupriadi', '$2y$10$wA1o.eX1kG.d.vC/s', 'mahasiswa'),
('leoauliautroham', '$2y$10$eX1kG.d.vC/s.bC8v.y', 'mahasiswa'),
('lilisrahmawatifirdaus', '$2y$10$G.d.vC/s.bC8v.yH9v.y', 'mahasiswa'),
('mpadu', '$2y$10$d.vC/s.bC8v.yH9v.yG1i7v', 'mahasiswa'),
('mrezatrilianaakbar', '$2y$10$vC/s.bC8v.yH9v.yG1i7vW6', 'mahasiswa'),
('mochamadreisalrivanza', '$2y$10$C8v.yH9v.yG1i7vW6i.j.9', 'mahasiswa'),
('muhamaddridwan', '$2y$10$v.yH9v.yG1i7vW6i.j.9jZ', 'mahasiswa'),
('muhammadikmalmaulana', '$2y$10$yH9v.yG1i7vW6i.j.9jZ8u', 'mahasiswa'),
('muhammadnazlinizzamulsayid', '$2y$10$9v.yG1i7vW6i.j.9jZ8uK/', 'mahasiswa'),
('nabilaalmasa', '$2y$10$yG1i7vW6i.j.9jZ8uK/e.', 'mahasiswa'),
('natanaelsiahaan', '$2y$10$G1i7vW6i.j.9jZ8uK/e.w', 'mahasiswa'),
('nazlanurasilah', '$2y$10$1i7vW6i.j.9jZ8uK/e.wA', 'mahasiswa'),
('nenengnurfariadah', '$2y$10$i7vW6i.j.9jZ8uK/e.wA1', 'mahasiswa'),
('nofalfitranugraha', '$2y$10$7vW6i.j.9jZ8uK/e.wA1o.', 'mahasiswa'),
('pebiriyani', '$2y$10$vW6i.j.9jZ8uK/e.wA1o.e', 'mahasiswa'),
('raishaputrialyaagani', '$2y$10$W6i.j.9jZ8uK/e.wA1o.eX', 'mahasiswa'),
('rickyrudiansyah', '$2y$10$6i.j.9jZ8uK/e.wA1o.eX1', 'mahasiswa'),
('ridwanabdurrohman', '$2y$10$i.j.9jZ8uK/e.wA1o.eX1k', 'mahasiswa'),
('rifkiahmadfahrudin', '$2y$10$.j.9jZ8uK/e.wA1o.eX1kG', 'mahasiswa'),
('rifqikamil', '$2y$10$j.9jZ8uK/e.wA1o.eX1kG.d', 'mahasiswa'),
('salmoniusjosiusramandey', '$2y$10$.9jZ8uK/e.wA1o.eX1kG.d.v', 'mahasiswa'),
('selviani', '$2y$10$9jZ8uK/e.wA1o.eX1kG.d.vC', 'mahasiswa'),
('sionyehezkielnababan', '$2y$10$jZ8uK/e.wA1o.eX1kG.d.vC/', 'mahasiswa'),
('syairaagniatuzzahra', '$2y$10$Z8uK/e.wA1o.eX1kG.d.vC/s', 'mahasiswa'),
('syehanahmadzain', '$2y$10$8uK/e.wA1o.eX1kG.d.vC/s.', 'mahasiswa'),
('trendiwijayasantoso', '$2y$10$uK/e.wA1o.eX1kG.d.vC/s.b', 'mahasiswa'),
('taufikhidayat', '$2y$10$K/e.wA1o.eX1kG.d.vC/s.bC', 'mahasiswa'),
('tifannyclarissaputrirohmat', '$2y$10$/e.wA1o.eX1kG.d.vC/s.bC8', 'mahasiswa'),
('vianazutamaningtyas', '$2y$10$e.wA1o.eX1kG.d.vC/s.bC8v', 'mahasiswa'),
('wellisafrinalahagu', '$2y$10$.wA1o.eX1kG.d.vC/s.bC8v.', 'mahasiswa'),
('willyfazrilramadhan', '$2y$10$wA1o.eX1kG.d.vC/s.bC8v.y', 'mahasiswa'),
('yanasuryana', '$2y$10$A1o.eX1kG.d.vC/s.bC8v.yH', 'mahasiswa'),
('yeyensusilawati', '$2y$10$1o.eX1kG.d.vC/s.bC8v.yH9', 'mahasiswa');