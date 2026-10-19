<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin jika belum ada.
        User::firstOrCreate(
            ['username' => 'admin_pusat'],
            [
                'password' => 'admin123',
                'role' => 'admin',
            ]
        );

        // Membuat akun staff jika belum ada.
        User::firstOrCreate(
            ['username' => 'staff_gudang'],
            [
                'password' => 'staff123',
                'role' => 'staff',
            ]
        );

        // Membuat kategori contoh jika belum ada.
        $elektronik = Category::firstOrCreate(
            ['name' => 'Elektronik'],
            ['description' => 'Kategori barang elektronik']
        );

        Category::firstOrCreate(
            ['name' => 'Umum'],
            ['description' => 'Kategori umum']
        );

        // Membuat produk contoh jika SKU belum ada.
        Product::firstOrCreate(
            ['sku' => 'ELK-001'],
            [
                'category_id' => $elektronik->id,
                'name' => 'Keyboard',
                'price' => 150000,
                'stock' => 10,
                'minimum_stock' => 5,
            ]
        );
    }
}
