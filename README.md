# Sistem Aspirasi Mahasiswa

Aplikasi web sederhana berbasis PHP dan MySQL untuk memfasilitasi penyampaian aspirasi mahasiswa kepada dosen. Sistem ini menjadi jembatan komunikasi terstruktur antara mahasiswa dan pengajar.

## Fitur

Aplikasi memiliki dua hak akses utama dengan fitur berbeda:

### Mahasiswa

- **Login:** Menggunakan username dan NIM sebagai password.
- **Kirim Aspirasi:** Mengirim aspirasi berdasarkan kategori (Fasilitas, Akademik, Layanan, Lainnya).
- **Lihat Riwayat:** Melihat riwayat aspirasi yang pernah dikirim.
- **Lihat Balasan:** Melihat balasan dari dosen untuk setiap aspirasi.

### Dosen

- **Login:** Menggunakan akun yang telah ditentukan.
- **Lihat Semua Aspirasi:** Melihat seluruh aspirasi dari mahasiswa, diurutkan dari yang terbaru.
- **Beri Balasan:** Memberikan atau memperbarui balasan untuk setiap aspirasi.

## Teknologi yang Digunakan

- **Backend:** PHP
- **Database:** MySQL / MariaDB
- **Frontend:** HTML & CSS (tanpa framework)

## Instalasi dan Konfigurasi

Ikuti langkah berikut untuk menjalankan proyek di lingkungan lokal:

### Clone Repositori

```bash
git clone https://github.com/ikuzan4000/aspirasiweb.git
cd aspirasiweb
```

### Setup Database

1. Buka phpMyAdmin atau database management tool lain yang Anda gunakan.
2. Buat database baru dengan nama `aspirasi_db`.
3. Lakukan import kode sql dari file bernama `database_setup` dan jalankan.
4. Buka browser dan jalankan skrip `reset_semua_password.php` untuk membuat tabel dan mengisi data pengguna secara otomatis:

    ```
    http://localhost/aspirasiweb/reset_semua_password.php
    ```
5. Setelah itu, jalankan skrip sql berikut untuk membuat tabel aspirasi yang akan membuat dua kolom baru untuk balasan dosen:
    ```sql
    ALTER TABLE aspirasi
    ADD COLUMN balasan TEXT NULL DEFAULT NULL,
    ADD COLUMN tanggal_balasan TIMESTAMP NULL DEFAULT NULL;

    ```

Skrip ini akan menghapus tabel lama (jika ada), membuat struktur baru, dan mengisi data pengguna dengan password yang sudah di-hash.

### Login ke Aplikasi

- **Halaman utama:** `http://localhost/aspirasiweb/`

#### Mahasiswa

- **Username:** Nama lengkap mahasiswa (misal: `ahmadkhoiron`)
- **Password:** NIM mahasiswa (misal: `23612091189`)

#### Dosen

- **Username:** `adib`
- **Password:** `12345678`

## Struktur File

Penjelasan singkat file utama:

- `index.php`: Halaman login utama.
- `koneksi.php`: Koneksi ke database MySQL.
- `style.css`: Styling antarmuka aplikasi.
- `mahasiswa.php`: Halaman utama mahasiswa (kirim aspirasi, lihat riwayat).
- `dosen.php`: Halaman utama dosen (lihat aspirasi, beri balasan).
- `proses_login.php`: Proses login dan pengalihan berdasarkan role.
- `proses_aspirasi.php`: Proses pengiriman aspirasi mahasiswa.
- `proses_balasan.php`: Proses balasan dosen.
- `logout.php`: Menghancurkan session dan kembali ke login.
- `reset_semua_password.php`: Setup awal database dan pengguna.

---