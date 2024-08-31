# Tentang Aplikasi
Aplikasi BlueTravel adalah platform yang menyediakan informasi lengkap tentang berbagai destinasi wisata menarik di Jawa Barat. Pengguna juga dapat memesan tiket untuk destinasi tersebut dengan mudah, menjadikan pengalaman liburan lebih praktis dan menyenangkan.
<br />
<br />

# Software Requirement
* PHP 8.3
* MySQL 8.0
* Git
* Browser Chrome
* Composer
* Laragon
<br />

# Fitur Aplikasi
1. Menampilkan informasi destinasi wisata di Jawa Barat <br />
   : Berisi Detail Informasi Destinasi Wisata Lengkap dengan Foto, video, deskripsi, dan harga tiket masuk
<hr />

2. Pemesanan Tiket <br />
   : Pengguna dapat memesan tiket masuk destinasi wisata yang diinginkan dengan mudah
<hr />


3. Mengelola Data Destinasi Wisata <br />
   : Admin dapat menambah, mengedit, dan menghapus data destinasi wisata
<hr />

4. Mengelola Data Pemesanan <br />
   : Admin dapat melihat data pemesanan tiket yang masuk, mengedit, dan menghapus data pemesanan
<hr />

5. Mengelola Data Pengguna <br />
   : Admin dapat melihat data pengguna yang terdaftar, mengedit, dan menghapus data pengguna
<hr />
<br />

# Cara Install Aplikasi

1. Clone repository ini ke dalam direktori lokal menggunakan Git Bash atau Command Prompt dengan perintah berikut :
```bash
git clone https://github.com/MuchamadZainuri/bluetravel.git
```
2. Masuk ke direktori aplikasi
```bash
cd bluetravel
```
3. Install dependency yang diperlukan
```bash
composer install
```
4. Jalankan service MySQL dan Apache pada Laragon
5. Buka browser dan akses phpmyadmin dengan alamat `http://localhost/phpmyadmin`
6. Buat database baru dengan nama `bluetravel`
7. Import file `database.sql` ke dalam database yang telah dibuat
8. Masuk ke direktori src
```bash
cd src
```
9. Copy file `.env.example` dan rename menjadi `.env`
```bash
cp .env.example .env
```
10. Konfigurasi file `.env` sesuai dengan konfigurasi database yang digunakan
```bash
DB_HOST=localhost
DB_DATABASE=bluetravel
DB_USERNAME=root
DB_PASSWORD=
```
11. Buka browser dan akses aplikasi dengan alamat `http://localhost/bluetravel`
    
12. Aplikasi siap digunakan
