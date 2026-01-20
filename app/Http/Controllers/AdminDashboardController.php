<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalTransactions = Transaction::count();

        $todayIncome = Transaction::whereDate('created_at', today())->sum('total');

        $bestProduct = DB::table('transaction_details')
            ->join('products', 'products.id', '=', 'transaction_details.product_id')
            ->select(
                'products.name',
                DB::raw('SUM(transaction_details.qty) as total_sold')
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->first();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalTransactions',
            'todayIncome',
            'bestProduct'
        ));
    }
}
