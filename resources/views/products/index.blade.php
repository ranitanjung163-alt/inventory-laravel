@extends('layouts.app')
@section('title', 'Produk')
@section('content')
<h1>Manajemen Produk</h1>
<p><a class="btn" href="{{ route('products.create') }}">Tambah Produk</a></p>
<form class="filters" method="GET" action="{{ route('products.index') }}">
<div><label>Cari nama/SKU</label><input name="search" value="{{ request('search') }}" placeholder="Nama atau SKU"></div>
<div><label>Kategori</label><select name="category_id"><option value="">Semua kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(request('category_id')==$category->id)>{{ $category->name }}</option>@endforeach</select></div>
<div><label>Urutkan</label><select name="sort">@foreach(['name'=>'Nama','price'=>'Harga','stock'=>'Stok','sku'=>'SKU','id'=>'Terbaru'] as $key=>$label)<option value="{{ $key }}" @selected($sort===$key)>{{ $label }}</option>@endforeach</select></div>
<div><label>Arah</label><select name="direction"><option value="asc" @selected($direction==='asc')>Naik</option><option value="desc" @selected($direction==='desc')>Turun</option></select></div>
<button>Filter</button><a href="{{ route('products.index') }}">Reset</a>
</form>
<table><thead><tr><th>SKU</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
@forelse($products as $product)
<tr><td>{{ $product->sku }}</td><td>{{ $product->name }}</td><td>{{ $product->category->name }}</td><td>Rp {{ number_format($product->price,0,',','.') }}</td><td>{{ $product->stock }}</td><td>@if($product->is_low_stock)<span class="low">Stok Rendah</span>@else Aman @endif</td>
<td><a href="{{ route('products.show',$product) }}">Detail</a> | <a href="{{ route('products.edit',$product) }}">Edit</a>
<form class="inline" method="POST" action="{{ route('products.destroy',$product) }}" onsubmit="return confirm('Hapus produk ini?')">@csrf @method('DELETE')<button>Hapus</button></form></td></tr>
@empty<tr><td colspan="7">Belum ada produk.</td></tr>@endforelse
</tbody></table>{{ $products->links() }}
@endsection
