<h2>Detail Transaksi</h2>

<p>
    Tanggal: {{ $transaction->created_at }} <br>
    Total: Rp {{ number_format($transaction->total) }}
</p>

<table border="1" cellpadding="8">
    <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>

    @foreach($transaction->details as $d)
    <tr>
        <td>{{ $d->product->name }}</td>
        <td>{{ $d->price }}</td>
        <td>{{ $d->qty }}</td>
        <td>{{ $d->price * $d->qty }}</td>
    </tr>
    @endforeach

</table>

<br>
<a href="/my-transactions">← Kembali</a>