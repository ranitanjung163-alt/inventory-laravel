
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1>Dashboard Inventory</h1>
        <p>Ringkasan data inventaris dan transaksi stok.</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Produk</div>
            <div class="stat-value">{{ $totalProducts }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Kategori</div>
            <div class="stat-value">{{ $totalCategories }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Produk Stok Rendah</div>
            <div class="stat-value {{ $lowStock > 0 ? 'low' : '' }}">
                {{ $lowStock }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Barang Masuk</div>
            <div class="stat-value">{{ $totalIn }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Barang Keluar</div>
            <div class="stat-value">{{ $totalOut }}</div>
        </div>
    </div>
@endsection
