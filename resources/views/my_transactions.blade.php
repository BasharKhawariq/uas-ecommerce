<h2>Riwayat Transaksi Saya</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    @foreach($transactions as $t)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $t->created_at }}</td>
        <td>Rp {{ number_format($t->total) }}</td>
        <td>
            <a href="/my-transactions/{{ $t->id }}">Detail</a>
        </td>
    </tr>
    @endforeach

</table>