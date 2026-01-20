<h2>Dashboard Admin</h2>

<ul>
    <li>Total Produk: {{ $totalProducts }}</li>
    <li>Total Kategori: {{ $totalCategories }}</li>
    <li>Total Transaksi: {{ $totalTransactions }}</li>
    <li>Omset Hari Ini: Rp {{ number_format($todayIncome) }}</li>
</ul>

<hr>

<h3>Produk Terlaris</h3>

@if($bestProduct)
<p>
    {{ $bestProduct->name }} <br>
    Terjual: {{ $bestProduct->total_sold }} pcs
</p>
@else
<p>Belum ada transaksi</p>
@endif