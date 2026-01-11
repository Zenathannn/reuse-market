<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('details', 'like', '%' . $search . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.products.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string|max:1000',
            'condition' => 'required|in:like_new,good,fair',
            'image_01' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_02' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_03' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image uploads
        foreach (['image_01', 'image_02', 'image_03'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('products', $filename, 'public');
                $validated[$imageField] = $path;
            }
        }

        // Set default values
        $validated['views'] = 0;
        $validated['rating'] = 0;

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string|max:1000',
            'condition' => 'required|in:like_new,good,fair',
            'image_01' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_02' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_03' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image uploads
        foreach (['image_01', 'image_02', 'image_03'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old image jika ada
                if ($product->$imageField) {
                    Storage::disk('public')->delete($product->$imageField);
                }
                // Upload new image
                $file = $request->file($imageField);
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('products', $filename, 'public');
                $validated[$imageField] = $path;
            } else {
                // Jika tidak upload gambar baru, gunakan gambar lama
                $validated[$imageField] = $product->$imageField;
            }
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Delete images
        foreach (['image_01', 'image_02', 'image_03'] as $imageField) {
            if ($product->$imageField && Storage::disk('public')->exists($product->$imageField)) {
                Storage::disk('public')->delete($product->$imageField);
            }
        }

        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }
}
