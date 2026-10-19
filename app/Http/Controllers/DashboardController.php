<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'lowStock' => Product::whereColumn('stock', '<=', 'minimum_stock')->count(),
            'totalIn' => StockMovement::where('type', 'IN')->sum('quantity'),
            'totalOut' => StockMovement::where('type', 'OUT')->sum('quantity'),
        ]);
    }
}
