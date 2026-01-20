<h2>Shop</h2>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Stok</th>
        <th>Beli</th>
    </tr>
    @foreach($products as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->price }}</td>
        <td>
            @if($p->image)
            <img src="{{ asset('storage/'.$p->image) }}" width="100">
            @endif
        </td>
        <td>{{ $p->stock }}</td>
        <td>
            <form action="/checkout" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $p->id }}">
                <input type="number" name="qty" min="1" required>
                <button type="submit">Beli</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>