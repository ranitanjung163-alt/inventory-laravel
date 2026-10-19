@extends('layouts.app')
@section('title', 'Transaksi Stok')
@section('content')
<h1>Transaksi Barang Masuk/Keluar</h1>
<form method="POST" action="{{ route('stock.store') }}">@csrf
<label>Produk</label><select name="product_id" required><option value="">Pilih produk</option>@foreach($products as $product)<option value="{{ $product->id }}" @selected(old('product_id')==$product->id)>{{ $product->sku }} - {{ $product->name }} (stok: {{ $product->stock }})</option>@endforeach</select>
<label>Tipe transaksi</label><select name="type" required><option value="IN" @selected(old('type')==='IN')>Barang masuk (IN)</option><option value="OUT" @selected(old('type')==='OUT')>Barang keluar (OUT)</option></select>
<label>Jumlah</label><input type="number" name="quantity" min="1" value="{{ old('quantity') }}" required>
<label>Catatan</label><textarea name="notes">{{ old('notes') }}</textarea>
<p><button>Catat transaksi</button></p>
</form>
<h2>Riwayat transaksi</h2>
<table><thead><tr><th>Waktu</th><th>SKU / Produk</th><th>Tipe</th><th>Jumlah</th><th>User</th><th>Catatan</th></tr></thead><tbody>
@forelse($histories as $item)<tr><td>{{ $item->created_at }}</td><td>{{ $item->product->sku }} - {{ $item->product->name }}</td><td>{{ $item->type }}</td><td>{{ $item->quantity }}</td><td>{{ $item->user->username }}</td><td>{{ $item->notes }}</td></tr>
@empty<tr><td colspan="6">Belum ada riwayat transaksi.</td></tr>@endforelse
</tbody></table>{{ $histories->links() }}
@endsection
