<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('details', 'like', '%' . $request->search . '%');
        }

        // Price Filter
        if ($request->has('price') && $request->price && $request->price !== 'all') {
            switch ($request->price) {
                case '0-500000':
                    $query->whereBetween('price', [0, 500000]);
                    break;
                case '500000-1000000':
                    $query->whereBetween('price', [500000, 1000000]);
                    break;
                case '1000000-5000000':
                    $query->whereBetween('price', [1000000, 5000000]);
                    break;
                case '5000000':
                    $query->where('price', '>=', 5000000);
                    break;
            }
        }

        // Condition Filter
        if ($request->has('condition') && is_array($request->condition) && count($request->condition) > 0) {
            $query->whereIn('condition', $request->condition);
        }

        // Sort
        if ($request->has('sort') && $request->sort) {
            switch ($request->sort) {
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'popular':
                    $query->orderBy('rating', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);
        $total = Product::count();

        return view('shop.index', compact('products', 'total'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();

        return view('shop.show', compact('product', 'relatedProducts'));
    }
}
