<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        // Data dummy untuk demo
        $wishlistItems = collect([
            (object)[
                'id' => 1,
                'pid' => 1,
                'name' => 'Kamera DSLR Canon 600D',
                'price' => 2800000,
                'image' => 'camera1.jpg'
            ],
            (object)[
                'id' => 2,
                'pid' => 2,
                'name' => 'Sepeda MTB 26 inch',
                'price' => 1500000,
                'image' => 'bike1.jpg'
            ]
        ]);

        return view('wishlist.index', compact('wishlistItems'));
    }

    public function add($productId)
    {
        return back()->with('success', 'Produk berhasil ditambahkan ke wishlist!');
    }

    public function remove($id)
    {
        return back()->with('success', 'Produk berhasil dihapus dari wishlist!');
    }
}
