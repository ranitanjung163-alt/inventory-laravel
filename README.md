# Inventory Laravel

Aplikasi web inventaris barang berbasis Laravel 12 dan MySQL/MariaDB yang dibuat untuk memenuhi tugas mata kuliah Web 5. Proyek ini merupakan latihan penerapan framework Laravel pada sistem pengelolaan inventaris.

## 1. Fitur Aplikasi

- Login dan logout untuk admin dan staff gudang.
- Dashboard ringkasan inventaris.
- CRUD kategori dan produk.
- Pencarian produk berdasarkan nama atau SKU.
- Filter kategori, pengurutan, dan pagination produk.
- Pencatatan transaksi barang masuk dan barang keluar.
- Pemantauan stok minimum produk.
- Validasi formulir.
- Pengelolaan pengguna oleh admin.
- Riwayat transaksi stok.

## 2. Teknologi

- PHP 8.2 atau lebih baru.
- Laravel 12.
- MySQL/MariaDB.
- Blade Template.
- Composer.
- Node.js dan NPM untuk aset frontend.

## 3. Persyaratan Instalasi

Pastikan PHP, Composer, MySQL/MariaDB, dan Node.js/NPM telah terpasang.

## 4. Cara Instalasi

1. Clone atau unduh repository ini.
2. Buka terminal pada folder proyek.
3. Pasang dependensi PHP:

   ```bash
   composer install
   ```

4. Salin `.env.example` menjadi `.env`. Pada Windows CMD, gunakan:

   ```cmd
   copy .env.example .env
   ```

5. Buat database bernama `inventory_db` melalui phpMyAdmin atau MySQL.
6. Sesuaikan konfigurasi database dalam `.env`:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inventory_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Sesuaikan username dan password dengan konfigurasi MySQL lokal.

7. Buat application key:

   ```bash
   php artisan key:generate
   ```

8. Jalankan migration dan seeder pada database yang telah disiapkan untuk instalasi:

   ```bash
   php artisan migrate --seed
   ```

9. Jika diperlukan, pasang dan bangun aset frontend:

   ```bash
   npm install
   npm run build
   ```

10. Jalankan server:

    ```bash
    php artisan serve
    ```

11. Buka `http://127.0.0.1:8000` pada browser.

**Penting:** Jangan menjalankan perintah reset database pada database yang berisi data penting. File `.env` lokal tidak boleh diunggah ke repository publik.

## 5. Akun Demo

| Peran | Username | Password |
|---|---|---|
| Admin | `admin_pusat` | `admin123` |
| Staff | `staff_gudang` | `staff123` |

Akun tersebut disediakan untuk pengujian lokal. Gunakan password yang kuat dan berbeda sebelum aplikasi digunakan di lingkungan produksi.

## 6. Struktur Proyek

- `app/Models/` — model dan relasi Eloquent.
- `app/Http/Controllers/` — controller untuk menangani permintaan aplikasi.
- `database/migrations/` — definisi struktur tabel.
- `database/factories/` — factory untuk data pengujian.
- `database/seeders/` — data awal dan akun demo.
- `resources/views/` — tampilan Blade.
- `routes/web.php` — definisi route web.
- `tests/` — pengujian otomatis.
- `docs/screenshots/` — bukti screenshot proyek, jika sudah ditambahkan.

## 7. Penjelasan MVC

Proyek ini menggunakan pola **Model–View–Controller (MVC)**.

- **Model:** berada di `app/Models/`. Contohnya `Product`, `Category`, dan `StockMovement`, yang mewakili data dan relasi database melalui Eloquent ORM.
- **View:** berada di `resources/views/`. File Blade menampilkan halaman login, dashboard, kategori, produk, dan transaksi kepada pengguna.
- **Controller:** berada di `app/Http/Controllers/`. Controller menerima permintaan dari route, menjalankan validasi dan logika aplikasi, berinteraksi dengan model, lalu mengembalikan view atau redirect.

Contoh alur penambahan produk:

1. Pengguna membuka formulir produk.
2. Route mengarahkan permintaan ke `ProductController`.
3. View Blade menampilkan formulir.
4. Ketika formulir dikirim, controller memvalidasi input.
5. Jika valid, data disimpan menggunakan model `Product`.
6. Aplikasi mengarahkan pengguna kembali ke halaman produk dan menampilkan hasilnya.

## 8. Relasi dan Database

- Satu kategori dapat memiliki banyak produk (`Category hasMany Product`).
- Setiap produk memiliki satu kategori (`Product belongsTo Category`).
- Produk dapat memiliki banyak riwayat transaksi stok.
- Migration digunakan untuk mendefinisikan struktur tabel.
- Seeder digunakan untuk menyiapkan data awal dan akun demo.

## 9. Pengujian

Jalankan pengujian otomatis menggunakan:

```bash
php artisan test
```

Untuk memeriksa route:

```bash
php artisan route:list
```

Hasil pengujian dan screenshot fitur dapat disertakan sebagai bukti pengerjaan. Jumlah tes yang lulus harus dilaporkan sesuai hasil aktual saat pengujian dijalankan.

## 10. Keamanan

- Jangan mengunggah `.env` ke repository publik.
- Gunakan `.env.example` sebagai contoh konfigurasi.
- Akun demo hanya untuk pengujian lokal.
- Validasi input dilakukan sebelum data disimpan.
- Transaksi barang keluar harus menolak jumlah yang melebihi stok tersedia.

## 11. Tujuan Proyek

Proyek ini dibuat untuk mempraktikkan pengembangan aplikasi web menggunakan Laravel, MVC, Eloquent ORM, migration, seeder, validasi, pagination, autentikasi, dan pengelolaan inventaris barang.