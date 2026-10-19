@extends('layouts.app')
@section('title', 'Detail Produk')
@section('content')
<h1>Detail Produk</h1>
<p><a class="btn" href="{{ route('products.index') }}">Kembali ke daftar produk</a></p>

<table>
    <tbody>
        <tr><th>SKU</th><td>{{ $product->sku }}</td></tr>
        <tr><th>Nama Produk</th><td>{{ $product->name }}</td></tr>
        <tr><th>Kategori</th><td>{{ $product->category->name }}</td></tr>
        <tr><th>Harga</th><td>Rp {{ number_format($product->price, 0, ',', '.') }}</td></tr>
        <tr><th>Stok Saat Ini</th><td>{{ $product->stock }}</td></tr>
        <tr><th>Stok Minimum</th><td>{{ $product->minimum_stock }}</td></tr>
        <tr><th>Status</th><td>@if($product->is_low_stock)<span class="low">Stok Rendah</span>@else Aman @endif</td></tr>
    </tbody>
</table>

<h2>Riwayat Pergerakan Stok</h2>
<table>
    <thead><tr><th>Tanggal</th><th>Jenis</th><th>Jumlah</th><th>Catatan</th><th>Pengguna</th></tr></thead>
    <tbody>
    @forelse($product->stockMovements->sortByDesc('created_at') as $movement)
        <tr>
            <td>{{ $movement->created_at?->format('d-m-Y H:i') }}</td>
            <td>{{ $movement->type }}</td>
            <td>{{ $movement->quantity }}</td>
            <td>{{ $movement->note ?: '-' }}</td>
            <td>{{ $movement->user->name ?? '-' }}</td>
        </tr>
    @empty
        <tr><td colspan="5">Belum ada riwayat pergerakan stok.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
