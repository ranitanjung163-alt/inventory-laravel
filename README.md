# Inventory Laravel

Aplikasi web inventaris barang yang dibuat menggunakan Laravel 12 dan MySQL untuk memenuhi tugas mata kuliah Web 5.

## Fitur Aplikasi

- Login dan logout untuk admin dan staff gudang.
- Dashboard ringkasan inventaris.
- CRUD (tambah, lihat, edit, hapus) kategori dan produk.
- Pencarian produk berdasarkan nama atau SKU.
- Filter kategori, pengurutan, dan pagination produk.
- Pencatatan transaksi barang masuk dan barang keluar.
- Pemantauan stok minimum produk.
- Validasi formulir untuk membantu menjaga data tetap benar.

## Teknologi yang Digunakan

- PHP 8.2 atau lebih baru.
- Laravel 12.
- MySQL/MariaDB.
- Blade Template.
- Composer.
- Node.js dan NPM untuk aset frontend.

## Persyaratan

Pastikan PHP, Composer, MySQL/MariaDB, dan Node.js/NPM telah terpasang di komputer.

## Cara Instalasi

1. Clone atau unduh repository proyek ini.
2. Buka terminal di folder proyek.
3. Pasang dependensi PHP:

   ```bash
   composer install
   ```

4. Salin `.env.example` menjadi `.env`. Pada Windows CMD, gunakan:

   ```cmd
   copy .env.example .env
   ```

5. Buat database baru bernama `inventory_db` melalui phpMyAdmin atau MySQL.
6. Sesuaikan konfigurasi database di file `.env`:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inventory_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Sesuaikan username dan password dengan konfigurasi MySQL di komputer masing-masing.

7. Buat application key:

   ```bash
   php artisan key:generate
   ```

8. Jalankan migrasi dan seeder:

   ```bash
   php artisan migrate --seed
   ```

9. Jika perlu membangun aset frontend, jalankan:

   ```bash
   npm install
   npm run build
   ```

10. Jalankan server Laravel:

    ```bash
    php artisan serve
    ```

11. Buka `http://127.0.0.1:8000` di browser.

**Catatan:** Jalankan perintah instalasi database pada database yang memang disiapkan untuk proyek ini. Jangan gunakan perintah reset database pada database yang berisi data penting.

## Akun Demo

Akun demo yang dibuat oleh seeder:

| Peran | Username | Password |
|---|---|---|
| Admin | `admin_pusat` | `admin123` |
| Staff | `staff_gudang` | `staff123` |

Gunakan akun tersebut hanya untuk pengujian lokal. Ganti kredensial demo sebelum aplikasi digunakan di lingkungan produksi.

## Pengujian

Untuk menjalankan pengujian otomatis:

```bash
php artisan test
```

## Struktur Proyek

- `app/Models/` — model dan relasi Eloquent.
- `app/Http/Controllers/` — controller aplikasi.
- `database/migrations/` — struktur tabel database.
- `database/factories/` — factory untuk data pengujian.
- `database/seeders/` — data awal dan akun demo.
- `resources/views/` — tampilan Blade.
- `routes/web.php` — definisi route web.
- `tests/` — pengujian otomatis.

## Keamanan

File `.env` berisi konfigurasi lokal dan tidak boleh diunggah ke repository publik. Gunakan `.env.example` sebagai contoh konfigurasi.

## Tujuan Proyek

Proyek ini dibuat sebagai latihan pengembangan aplikasi web menggunakan Laravel, konsep MVC, Eloquent ORM, migration, seeder, validasi, dan pengelolaan inventaris barang.
