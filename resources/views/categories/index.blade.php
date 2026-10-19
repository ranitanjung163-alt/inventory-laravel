@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
<h1>Manajemen Kategori</h1>
<form method="POST" action="{{ route('categories.store') }}">@csrf
<label>Nama kategori</label><input name="name" value="{{ old('name') }}" required>
<label>Deskripsi</label><textarea name="description">{{ old('description') }}</textarea>
<p><button type="submit">Tambah kategori</button></p>
</form>
<table><thead><tr><th>Nama</th><th>Deskripsi</th><th>Jumlah produk</th><th>Aksi</th></tr></thead><tbody>
@forelse($categories as $category)
<tr><td>
<form method="POST" action="{{ route('categories.update', $category) }}">@csrf @method('PUT')
<input name="name" value="{{ $category->name }}" required>
</td><td><textarea name="description">{{ $category->description }}</textarea></td>
<td>{{ $category->products_count }}</td><td><button>Simpan</button></form>
<form class="inline" method="POST" action="{{ route('categories.destroy', $category) }}" onsubmit="return confirm('Hapus kategori ini?')">@csrf @method('DELETE')<button>Hapus</button></form></td></tr>
@empty <tr><td colspan="4">Belum ada kategori.</td></tr> @endforelse
</tbody></table>{{ $categories->links() }}
@endsection
