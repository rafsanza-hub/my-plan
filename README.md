# MyPlan - Sistem Keuangan Pribadi

**MyPlan** adalah aplikasi berbasis web yang memungkinkan pengguna untuk mengelola keuangan pribadi mereka dengan mudah dan efisien. Aplikasi ini menyediakan fitur untuk mencatat pengeluaran, pemasukan, serta laporan keuangan yang lengkap.

## Fitur
- **Login, Register & Magic login link (via Email)**
- **Dashboard Admin**: Mengelola data keuangan, transaksi, dan laporan.
- **Daftar Transaksi**: Menambah, mengedit, dan menghapus transaksi pemasukan dan pengeluaran.
- **Laporan Keuangan**: Menampilkan laporan bulanan dan tahunan.
- **Pengelolaan Kategori Pengeluaran**: Membuat dan mengelola kategori pengeluaran seperti makanan, transportasi, hiburan, dll.
- **Grafik Keuangan**: Menampilkan grafik pemasukan dan pengeluaran menggunakan ApexCharts.
- **Pencatatan Utang/Piutang**: Melacak utang dan piutang Anda.
- **Keamanan Otentikasi**: Menggunakan **CodeIgniter Shield** untuk keamanan otentikasi pengguna.

## Framework dan Library Yang Digunakan
- **CodeIgniter 4**: Framework PHP untuk pengembangan aplikasi.
- **CodeIgniter Shield**: Untuk autentikasi dan manajemen akses pengguna.
- **Bootstrap 5**: Framework CSS untuk tampilan yang responsif dan modern.
- **Tabler Icons**: Koleksi ikon yang digunakan di aplikasi.
- **ApexCharts**: Untuk menampilkan grafik laporan keuangan.
- **Endroid QR Code Generator**: Untuk menghasilkan kode QR.
- **Mebjas Html5-QRCode Scanner**: Untuk pemindaian QR menggunakan kamera.

## Cara Penggunaan

### Persyaratan
Sebelum memulai, pastikan Anda memiliki perangkat dengan persyaratan berikut:
- **PHP 8.1+** dan **MySQL** atau **XAMPP versi 8.1+** dengan mengaktifkan extension `intl` dan `gd`.
- **Composer** untuk manajemen dependensi.
- **(Opsional)** Kamera/webcam untuk pemindaian QR. Anda bisa menggunakan kamera HP dengan bantuan software **DroidCam**.

### Instalasi

1. **Unduh dan impor kode proyek ini ke dalam direktori proyek Anda (htdocs):**
   ```bash
   git clone https://github.com/rafsanza-hub/myplan.git
   cd myplan
Salin file .env.example menjadi .env:

bash
Salin kode
cp .env.example .env
(Opsional) Konfigurasi file .env untuk mengatur parameter seperti koneksi database dan pengaturan lainnya:

ini
Salin kode
DB_HOST=localhost
DB_NAME=myplan_financial
DB_USER=root
DB_PASS=
Instal dependensi yang diperlukan: Jalankan perintah berikut di terminal:

bash
Salin kode
composer install
Buat database myplan_financial di phpMyAdmin atau MySQL:

Akses phpMyAdmin dan buat database baru dengan nama myplan_financial.
Jalankan migrasi database untuk membuat struktur tabel yang diperlukan: Ketikkan perintah berikut di terminal:

bash
Salin kode
php spark migrate --all
(Opsional) Isi database dengan data dummy/seeder: Jika Anda ingin mengisi database dengan data dummy, jalankan perintah ini:

bash
Salin kode
php spark db:seed Seeder # Semua seeder
php spark db:seed TransactionSeeder # Transaksi
php spark db:seed CategorySeeder # Kategori Pengeluaran
php spark db:seed DebtSeeder # Utang/Piutang
Jalankan aplikasi web: Jalankan perintah berikut untuk memulai server lokal:

bash
Salin kode
php spark serve
Akses aplikasi di browser:

Buka http://localhost:8080 untuk melihat aplikasi Anda.
Login menggunakan kredensial superadmin berikut:

Username: superadmin
Email: superadmin@admin.com
Password: superadmin
Contributing
Kami menerima kontribusi dari komunitas terbuka untuk meningkatkan aplikasi ini. Jika Anda menemukan masalah, bug, atau memiliki saran untuk peningkatan, silakan buat issue baru dalam repositori ini atau ajukan pull request.

Lisensi
Aplikasi ini dilisensikan di bawah MIT License.

Dukungan
Jika Anda mengalami masalah atau memiliki pertanyaan, buka issue di repositori ini atau kirim email ke kami di support@myplan.com.

Terima kasih telah menggunakan MyPlan! Kami harap aplikasi ini dapat membantu Anda mengelola keuangan pribadi dengan lebih baik dan efisien.
