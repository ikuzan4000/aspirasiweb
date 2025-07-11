Sistem Aspirasi Mahasiswa
Sebuah aplikasi web sederhana yang dibangun menggunakan PHP dan MySQL untuk memfasilitasi penyampaian aspirasi dari mahasiswa kepada dosen. Aplikasi ini bertujuan untuk menjadi jembatan komunikasi yang terstruktur antara mahasiswa dan pihak pengajar.

Fitur
Aplikasi ini memiliki dua hak akses (role) dengan fitur yang berbeda:

Mahasiswa
Login: Mahasiswa dapat login ke sistem menggunakan username dan NIM mereka sebagai password.

Kirim Aspirasi: Dapat mengirimkan aspirasi berdasarkan kategori (Fasilitas, Akademik, Layanan, Lainnya).

Lihat Riwayat: Dapat melihat riwayat aspirasi yang pernah dikirimkan.

Lihat Balasan: Dapat melihat balasan yang diberikan oleh dosen untuk setiap aspirasi.

Dosen
Login: Dosen dapat login menggunakan akun yang telah ditentukan.

Lihat Semua Aspirasi: Dapat melihat seluruh daftar aspirasi yang masuk dari semua mahasiswa, diurutkan dari yang terbaru.

Beri Balasan: Dapat memberikan atau memperbarui balasan untuk setiap aspirasi yang masuk.

Teknologi yang Digunakan
Backend: PHP

Database: MySQL / MariaDB

Frontend: HTML & CSS (tanpa framework)

Instalasi dan Konfigurasi
Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut:

Clone Repositori

git clone [URL_REPOSITORY_ANDA]
cd [NAMA_FOLDER_PROYEK]

Setup Database

Buka phpMyAdmin atau database management tool lainnya.

Buat database baru dengan nama aspirasi_db.

Inisialisasi Tabel dan Data Pengguna

Pastikan web server Anda (seperti XAMPP atau Laragon) sudah berjalan.

Buka browser dan jalankan skrip reset_semua_password.php untuk membuat tabel dan mengisi data pengguna secara otomatis.

URL: http://localhost/[nama_folder_proyek]/reset_semua_password.php

Skrip ini akan menghapus tabel lama (jika ada), membuat struktur baru, dan mengisi data pengguna dengan password yang sudah di-hash dengan aman.

Login ke Aplikasi

Buka halaman utama aplikasi: http://localhost/[nama_folder_proyek]/

Login sebagai Mahasiswa:

Username: Nama lengkap mahasiswa (contoh: ahmadkhoiron)

Password: NIM mahasiswa (contoh: 23612091189)

Login sebagai Dosen:

Username: adib

Password: 12345678

Struktur File
Berikut adalah penjelasan singkat mengenai file-file utama dalam proyek ini:

index.php: Halaman login utama.

koneksi.php: Mengatur koneksi ke database MySQL.

style.css: Berisi semua styling untuk antarmuka aplikasi.

mahasiswa.php: Halaman utama untuk mahasiswa (mengirim aspirasi dan melihat riwayat).

dosen.php: Halaman utama untuk dosen (melihat semua aspirasi dan memberi balasan).

proses_login.php: Memproses data login dan mengarahkan pengguna berdasarkan rolenya.

proses_aspirasi.php: Memproses formulir pengiriman aspirasi dari mahasiswa.

proses_balasan.php: Memproses formulir balasan dari dosen.

logout.php: Menghancurkan session dan mengarahkan pengguna kembali ke halaman login.

reset_semua_password.php: Skrip utilitas untuk setup awal database dan pengguna.

Dibuat untuk tujuan demonstrasi dan pembelajaran.
