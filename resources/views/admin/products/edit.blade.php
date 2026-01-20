<h2>Edit Produk</h2>

<form action="/admin/products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT')

    Nama:<br>
    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    Kategori:<br>
    <select name="category_id">
        @foreach($categories as $c)
        <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
            {{ $c->name }}
        </option>
        @endforeach
    </select><br><br>

    Harga Jual:<br>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    Harga Modal:<br>
    <input type="number" name="cost" value="{{ $product->cost }}"><br><br>

    Stok:<br>
    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    Deskripsi:<br>
    <textarea name="description">{{ $product->description }}</textarea><br><br>

    <button type="submit">Update</button>
</form>