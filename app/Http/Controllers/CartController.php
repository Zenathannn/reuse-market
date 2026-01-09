<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Data dummy untuk demo
        $cartItems = collect([
            (object)[
                'id' => 1,
                'name' => 'Laptop Bekas Dell Core i5',
                'price' => 3500000,
                'quantity' => 1,
                'image' => 'laptop1.jpg'
            ],
            (object)[
                'id' => 2,
                'name' => 'HP Samsung Galaxy S20',
                'price' => 4200000,
                'quantity' => 2,
                'image' => 'phone1.jpg'
            ]
        ]);

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, $productId)
    {
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        return back()->with('success', 'Keranjang berhasil diupdate!');
    }

    public function remove($id)
    {
        return back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function clear()
    {
        return back()->with('success', 'Keranjang berhasil dikosongkan!');
    }
}
