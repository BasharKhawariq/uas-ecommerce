<h2>Tambah Kategori</h2>

<form action="/admin/categories" method="POST">
    @csrf

    Nama:<br>
    <input type="text" name="name"><br><br>

    Deskripsi:<br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>