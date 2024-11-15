# MyPlan - Sistem Keuangan Pribadi
![myplan2](https://github.com/user-attachments/assets/7c9b52ce-dca9-42ad-9502-398ddac94656)


**MyPlan** adalah aplikasi berbasis web yang memungkinkan pengguna untuk mengelola keuangan pribadi mereka dengan mudah dan efisien. Aplikasi ini menyediakan fitur untuk mencatat pengeluaran, pemasukan, serta laporan keuangan yang lengkap.

## Framework dan Library Yang Digunakan
- [CodeIgniter 4](https://codeigniter.com/)
- [Myth/Auth](https://github.com/lonnieezell/myth-auth)
- [Bootstrap 5](https://getbootstrap.com/)
- [Sneat Admin Template](https://github.com/pixinvent/sneat-bootstrap-html-admin-template-free)
- [SweetAlert2](https://sweetalert2.github.io/)
- [Boxicons](https://boxicons.com/)


## Cara Penggunaan

### Persyaratan
Pastikan perangkat Anda memiliki:
- **PHP 8.1+** dan **MySQL** atau **XAMPP versi 8.1+** dengan extension `intl` dan `gd` diaktifkan.
- **Composer** untuk manajemen dependensi.

### Instalasi

Ikuti langkah-langkah berikut untuk menginstal aplikasi pengelolaan keuangan pribadi ini:

1. **Unduh dan Impor Kode project**
   - Salin atau unduh kode project ini ke direktori project Anda, misalnya `htdocs` pada XAMPP.

2. **Konfigurasi File `.env`**
   - Jika belum memiliki file `.env`, salin file `env` menjadi `.env`.
   - **Penting ⚠️**: Pastikan untuk menyesuaikan pengaturan di file `.env`, terutama untuk koneksi database, agar sesuai dengan lingkungan pengembangan Anda.


3. **Instalasi Dependensi**
   - Jalankan perintah berikut di terminal untuk menginstal semua dependensi yang diperlukan:

     ```bash
     composer install
     ```

4. **Membuat Database**
   - Buat database baru di phpMyAdmin atau MySQL, dengan nama `myplan`.

5. **Menjalankan Migrasi Database**
   - Jalankan perintah migrasi untuk membuat tabel-tabel yang diperlukan di database. Ketikkan perintah berikut di terminal:

     ```bash
     php spark migrate --all
     ```

6. **Menambahkan Data Login**
   - Jalankan perintah berikut untuk menambahkan data pengguna:

     ```bash
     php spark db:seed AllSeeder
     ```

7. **Menjalankan Website**
   - Setelah semua terinstal, jalankan server aplikasi menggunakan perintah berikut:

     ```bash
     php spark serve
     ```

8. **Akses Aplikasi**
   - Buka aplikasi melalui browser di [http://localhost:8080](http://localhost:8080).

9. **Login dengan Akun Superadmin**
    - Gunakan akun berikut untuk mengakses aplikasi:


     ```txt
     username : superadmin
     email    : superadmin@admin.com
     password : superadmin
     ```

---

## Kontribusi

Kami sangat mengapresiasi kontribusi dari komunitas untuk meningkatkan aplikasi ini. Jika Anda menemukan bug, masalah, atau memiliki saran untuk perbaikan, Anda bisa:

- Membuat **issue baru** di repositori ini.
- Mengajukan **pull request** untuk fitur atau perbaikan yang telah Anda buat.

Setiap kontribusi sangat berharga untuk pengembangan aplikasi ini.

---

### Catatan Tambahan

- Pastikan Anda telah memeriksa dan mengonfigurasi database serta file `.env` dengan benar agar aplikasi dapat berjalan lancar.
- Untuk pengaturan tambahan atau modifikasi, Anda dapat merujuk ke dokumentasi dan tutorial di repositori ini.
