<h2>Statistik Penjualan</h2>

<ul>
    <li>Omset Hari Ini: Rp {{ number_format($today) }}</li>
    <li>Omset Bulan Ini: Rp {{ number_format($month) }}</li>
    <li>Omset Tahun Ini: Rp {{ number_format($year) }}</li>
    <li>Omset Total: Rp {{ number_format($all) }}</li>
    <li>Total Keuntungan: Rp {{ number_format($profit) }}</li>
</ul>

<hr>

<h3>Produk Paling Laku</h3>

@if($bestProduct)
    <p>
        {{ $bestProduct->name }} <br>
        Total Terjual: {{ $bestProduct->total_sold }} pcs
    </p>
@else
    <p>Belum ada transaksi.</p>
@endif
