<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        $wishlistItems = collect();

        foreach ($wishlist as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $wishlistItems->push((object)[
                    'id' => $productId,
                    'pid' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image_01,
                    'rating' => $product->rating ?? 0,
                    'condition' => $product->condition ?? 'good'
                ]);
            }
        }

        return view('wishlist.index', compact('wishlistItems'));
    }

    public function add($product)
    {
        $productId = (int)$product;
        $product = Product::findOrFail($productId);
        $wishlist = session()->get('wishlist', []);

        if (!in_array($productId, $wishlist)) {
            $wishlist[] = $productId;
            session()->put('wishlist', $wishlist);
            return back()->with('success', $product->name . ' berhasil ditambahkan ke wishlist!');
        }

        return back()->with('info', 'Produk sudah ada di wishlist!');
    }

    public function remove($id)
    {
        $productId = (int)$id;
        $wishlist = session()->get('wishlist', []);

        if (($key = array_search($productId, $wishlist)) !== false) {
            unset($wishlist[$key]);
            session()->put('wishlist', array_values($wishlist));
            return back()->with('success', 'Produk berhasil dihapus dari wishlist!');
        }

        return back()->with('error', 'Produk tidak ditemukan di wishlist!');
    }

    public function moveAll(Request $request)
    {
        $wishlist = session()->get('wishlist', []);

        if (empty($wishlist)) {
            return back()->with('info', 'Wishlist Anda kosong.');
        }

        $cart = session()->get('cart', []);

        foreach ($wishlist as $productId) {
            // ensure product exists
            $product = Product::find($productId);
            if (! $product) {
                continue;
            }

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = ['quantity' => 1];
            }
        }

        session()->put('cart', $cart);
        session()->forget('wishlist');

        return redirect()->route('cart')->with('success', 'Semua item wishlist dipindahkan ke keranjang.');
    }
}
