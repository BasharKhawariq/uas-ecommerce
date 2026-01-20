<h2>Data Produk</h2>

<a href="/admin/products/create">+ Tambah Produk</a>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Total Terjual</th>
        <th>Aksi</th>
    </tr>
    @foreach($products as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->category->name }}</td>
        <td>{{ $p->price }}</td>
        <td>{{ $p->stock }}</td>
        <td>{{ $p->total_sold ?? 0 }}</td>
        <td>
            <a href="/admin/products/{{ $p->id }}/edit">Edit</a>
            <form action="/admin/products/{{ $p->id }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>