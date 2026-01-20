<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($request->qty > $product->stock) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        $total = $request->qty * $product->price;

        $trx = Transaction::create([
            'user_id' => Auth::id(),
            'total' => $total
        ]);

        TransactionDetail::create([
            'transaction_id' => $trx->id,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'price' => $product->price
        ]);

        $product->decrement('stock', $request->qty);

        return back()->with('success', 'Transaksi berhasil');
    }

    public function myTransactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('my_transactions', compact('transactions'));
    }

    public function detail($id)
    {
        $transaction = Transaction::with('details.product')
                        ->where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        return view('my_transaction_detail', compact('transaction'));
    }
}
