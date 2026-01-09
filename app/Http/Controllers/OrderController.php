<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Data dummy untuk demo
        $orders = collect([
            (object)[
                'id' => 1001,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'number' => '0812345678',
                'method' => 'cash',
                'address' => 'Jl. Contoh No. 123, Surabaya',
                'total_products' => 'Laptop Bekas (1), HP Samsung (2)',
                'total_price' => 11900000,
                'placed_on' => now()->subDays(3),
                'payment_status' => 'pending'
            ],
            (object)[
                'id' => 1002,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'number' => '0812345678',
                'method' => 'transfer',
                'address' => 'Jl. Contoh No. 123, Surabaya',
                'total_products' => 'Kamera DSLR (1)',
                'total_price' => 2800000,
                'placed_on' => now()->subDays(7),
                'payment_status' => 'completed'
            ]
        ]);

        return view('orders.index', compact('orders'));
    }

    public function checkout()
    {
        // Data dummy cart items
        $cartItems = collect([
            (object)[
                'id' => 1,
                'name' => 'Laptop Bekas Dell Core i5',
                'price' => 3500000,
                'quantity' => 1,
            ],
            (object)[
                'id' => 2,
                'name' => 'HP Samsung Galaxy S20',
                'price' => 4200000,
                'quantity' => 2,
            ]
        ]);

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('orders.checkout', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:20',
            'number' => 'required|string|max:10',
            'email' => 'required|email|max:50',
            'method' => 'required|in:cash,transfer,credit_card',
            'address' => 'required|string|max:500',
        ]);

        return redirect()->route('orders')->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
    }

    public function show($id)
    {
        // Implementasi detail order
        return redirect()->route('orders')->with('info', 'Halaman detail order akan segera tersedia!');
    }
}
