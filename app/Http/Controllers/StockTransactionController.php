<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StockTransactionController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();
        $histories = StockMovement::with(['product', 'user'])->latest()->paginate(15);
        return view('stock.index', compact('products', 'histories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'type' => ['required', Rule::in(['IN', 'OUT'])],
            'quantity' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        try {
            DB::transaction(function () use ($data) {
                $product = Product::whereKey($data['product_id'])->lockForUpdate()->firstOrFail();

                if ($data['type'] === 'OUT' && $data['quantity'] > $product->stock) {
                    throw new \DomainException('Stok tidak mencukupi. Stok saat ini: '.$product->stock);
                }

                if ($data['type'] === 'IN') {
                    $product->increment('stock', $data['quantity']);
                } else {
                    $product->decrement('stock', $data['quantity']);
                }

                StockMovement::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'type' => $data['type'],
                    'quantity' => $data['quantity'],
                    'notes' => $data['notes'] ?? null,
                ]);
            });
        } catch (\DomainException $e) {
            return back()->withInput()->withErrors(['quantity' => $e->getMessage()]);
        }

        return redirect()->route('stock.index')->with('success', 'Transaksi berhasil dicatat dan stok diperbarui.');
    }
}
