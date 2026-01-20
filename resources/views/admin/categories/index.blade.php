<h2>Data Kategori</h2>

<a href="/admin/categories/create">+ Tambah Kategori</a>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    @foreach($categories as $c)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->description }}</td>
        <td>
            <a href="/admin/categories/{{ $c->id }}/edit">Edit</a>
            <form action="/admin/categories/{{ $c->id }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>