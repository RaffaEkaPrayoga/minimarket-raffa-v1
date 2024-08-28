# Minimarket Raffa v1

Minimarket Raffa v1 adalah sebuah sistem manajemen inventory dan kasir berbasis web yang dibangun menggunakan PHP dan MySQL. Aplikasi ini dirancang untuk membantu pengelolaan barang, transaksi, dan laporan keuangan di minimarket.

## Fitur

- **Manajemen Produk**: Tambah, edit, dan hapus produk.
- **Manajemen Kategori**: Pengelolaan kategori produk.
- **Manajemen Pelanggan**: Mengelola data pelanggan.
- **Manajemen Supplier**: Pengelolaan data supplier.
- **Transaksi Penjualan**: Fitur kasir untuk mencatat penjualan.
- **Laporan**: Melihat dan mencetak laporan penjualan.
- **Manajemen Pengguna**: Hak akses berdasarkan peran pengguna (SuperAdmin, Admin, dan User).

## Teknologi yang Digunakan

- **Backend**: PHP (versi yang disarankan: 7.4 atau lebih baru)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Library Tambahan**: 
  - [SweetAlert](https://sweetalert2.github.io/) untuk memberikan feedback kepada pengguna.
  - [MPDF](https://mpdf.github.io/) untuk menghasilkan laporan dalam format PDF.

## Instalasi

1. **Clone repository ini:**
   ```bash
   git clone https://github.com/RaffaEkaPrayoga/minimarket-raffa-v1.git
   ```
2. **Konfigurasi database:**
   - Buat database baru di MySQL.
   - Impor file `dbs_kasir.sql` yang ada di folder `database` ke database yang telah dibuat.

3. **Konfigurasi environment:**
   - Pastikan PHP dan MySQL sudah terpasang di server Anda.
   - Tempatkan proyek ini di direktori root server lokal Anda (misalnya, `htdocs` untuk XAMPP).

4. **Jalankan aplikasi:**
   - Buka browser dan akses aplikasi melalui `http://localhost/minimarket-raffa-v1`.

## Penggunaan

1. **Login:**
   - Masuk dengan kredensial SuperAdmin yang telah dibuat.
   
2. **Manajemen Data:**
   - Tambah dan kelola produk, kategori, pelanggan, dan supplier.
   
3. **Transaksi:**
   - Gunakan fitur kasir untuk melakukan transaksi penjualan.
   
4. **Laporan:**
   - Lihat dan cetak laporan penjualan berdasarkan periode waktu tertentu.
