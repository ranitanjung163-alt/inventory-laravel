<label>SKU</label><input name="sku" value="{{ old('sku', $product->sku ?? '') }}" required>
<label>Nama produk</label><input name="name" value="{{ old('name', $product->name ?? '') }}" required>
<label>Kategori</label><select name="category_id" required><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '')==$category->id)>{{ $category->name }}</option>@endforeach</select>
<label>Harga</label><input type="number" name="price" min="0" step="0.01" value="{{ old('price', $product->price ?? 0) }}" required>
<label>Stok</label><input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}" required>
<label>Minimum stok</label><input type="number" name="minimum_stock" min="0" value="{{ old('minimum_stock', $product->minimum_stock ?? 5) }}" required>
<p><button type="submit">Simpan</button> <a href="{{ route('products.index') }}">Batal</a></p>
