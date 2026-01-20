<h2>Tambah Produk</h2>

<form action="/admin/products" method="POST">
    @csrf

    Nama:<br>
    <input type="text" name="name"><br><br>

    Kategori:<br>
    <select name="category_id">
        @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select><br><br>

    Harga Jual:<br>
    <input type="number" name="price"><br><br>

    Harga Modal:<br>
    <input type="number" name="cost"><br><br>

    Stok:<br>
    <input type="number" name="stock"><br><br>

    Deskripsi:<br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>