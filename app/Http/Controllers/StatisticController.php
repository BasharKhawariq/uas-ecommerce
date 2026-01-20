<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class StatisticController extends Controller
{
    public function index()
    {
        // Omset hari ini
        $today = Transaction::whereDate('created_at', today())->sum('total');

        // Omset bulan ini
        $month = Transaction::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        // Omset tahun ini
        $year = Transaction::whereYear('created_at', now()->year)->sum('total');

        // Omset keseluruhan
        $all = Transaction::sum('total');

        // Total keuntungan
        $profit = DB::table('transaction_details')
            ->join('products', 'products.id', '=', 'transaction_details.product_id')
            ->select(DB::raw('SUM((transaction_details.price - products.cost) * transaction_details.qty) as profit'))
            ->value('profit');

        // 🔥 Produk paling laku
        $bestProduct = DB::table('transaction_details')
            ->join('products', 'products.id', '=', 'transaction_details.product_id')
            ->select(
                'products.name',
                DB::raw('SUM(transaction_details.qty) as total_sold')
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->first();

        return view('admin.statistics', compact(
            'today',
            'month',
            'year',
            'all',
            'profit',
            'bestProduct'
        ));
    }
}
