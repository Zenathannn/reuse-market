<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Data dummy untuk demo dengan berbagai status
        $allOrders = collect([
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
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'number' => '0898765432',
                'method' => 'transfer',
                'address' => 'Jl. Ahmad Yani No. 456, Jakarta',
                'total_products' => 'Kamera DSLR (1)',
                'total_price' => 2800000,
                'placed_on' => now()->subDays(7),
                'payment_status' => 'processing'
            ],
            (object)[
                'id' => 1003,
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'number' => '0856789012',
                'method' => 'credit_card',
                'address' => 'Jl. Gajah Mada No. 789, Bandung',
                'total_products' => 'Sepeda MTB (1)',
                'total_price' => 1500000,
                'placed_on' => now()->subDays(5),
                'payment_status' => 'shipped'
            ],
            (object)[
                'id' => 1004,
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'number' => '0812111222',
                'method' => 'cash',
                'address' => 'Jl. Diponegoro No. 321, Medan',
                'total_products' => 'Kulkas Sharp (1)',
                'total_price' => 1200000,
                'placed_on' => now()->subDays(15),
                'payment_status' => 'completed'
            ],
            (object)[
                'id' => 1005,
                'name' => 'Rudi Hartono',
                'email' => 'rudi@example.com',
                'number' => '0833333444',
                'method' => 'transfer',
                'address' => 'Jl. Sudirman No. 555, Semarang',
                'total_products' => 'Meja Kayu (1)',
                'total_price' => 750000,
                'placed_on' => now()->subDays(10),
                'payment_status' => 'completed'
            ],
            (object)[
                'id' => 1006,
                'name' => 'Eka Putri',
                'email' => 'eka@example.com',
                'number' => '0877777888',
                'method' => 'credit_card',
                'address' => 'Jl. Veteran No. 666, Yogyakarta',
                'total_products' => 'HP Samsung (1)',
                'total_price' => 4200000,
                'placed_on' => now()->subDays(1),
                'payment_status' => 'pending'
            ],
        ]);

        // Filter berdasarkan status
        $status = $request->query('status', 'all');
        $orders = $status === 'all' ? $allOrders : $allOrders->where('payment_status', $status)->values();

        // Count untuk setiap status
        $statusCounts = [
            'all' => $allOrders->count(),
            'pending' => $allOrders->where('payment_status', 'pending')->count(),
            'processing' => $allOrders->where('payment_status', 'processing')->count(),
            'shipped' => $allOrders->where('payment_status', 'shipped')->count(),
            'completed' => $allOrders->where('payment_status', 'completed')->count(),
        ];

        return view('orders.index', compact('orders', 'status', 'statusCounts'));
    }

    public function checkout()
    {
        // Get cart from session
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong!');
        }

        // Rebuild cartItems from database
        $cartItems = collect();
        $total = 0;

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $quantity = $item['quantity'] ?? 1;
                $itemTotal = $product->price * $quantity;
                $total += $itemTotal;
                
                $cartItems->push((object)[
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->image_01,
                ]);
            }
        }

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
