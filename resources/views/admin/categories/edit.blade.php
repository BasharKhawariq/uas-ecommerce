<h2>Edit Kategori</h2>

<form action="/admin/categories/{{ $category->id }}" method="POST">
    @csrf
    @method('PUT')

    Nama:<br>
    <input type="text" name="name" value="{{ $category->name }}"><br><br>

    Deskripsi:<br>
    <textarea name="description">{{ $category->description }}</textarea><br><br>

    <button type="submit">Update</button>
</form>