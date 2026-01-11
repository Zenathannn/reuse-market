@extends('layouts.app')

@section('title', $product->name . ' - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-green-200 transition"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="/shop" class="hover:text-green-200 transition">Toko</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">{{ $product->name }}</span>
        </nav>
        <h1 class="text-3xl font-black">{{ $product->name }}</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Product Images -->
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $product->image_01) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover">
            </div>
            <div class="grid grid-cols-3 gap-4">
                @if($product->image_01)
                <div class="bg-white rounded-xl shadow overflow-hidden cursor-pointer hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $product->image_01) }}" alt="Image 1" class="w-full h-24 object-cover">
                </div>
                @endif
                @if($product->image_02)
                <div class="bg-white rounded-xl shadow overflow-hidden cursor-pointer hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $product->image_02) }}" alt="Image 2" class="w-full h-24 object-cover">
                </div>
                @endif
                @if($product->image_03)
                <div class="bg-white rounded-xl shadow overflow-hidden cursor-pointer hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $product->image_03) }}" alt="Image 3" class="w-full h-24 object-cover">
                </div>
                @endif
            </div>
        </div>

        <!-- Product Details -->
        <div class="space-y-6">
            <!-- Title & Rating -->
            <div>
                <h1 class="text-3xl font-black text-gray-800 mb-3">{{ $product->name }}</h1>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-yellow-400">
                        @for($i = 0; $i < floor($product->rating); $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            @if($product->rating - floor($product->rating) >= 0.5)
                            <i class="fas fa-star-half-alt"></i>
                            @endif
                    </div>
                    <span class="text-gray-600">({{ $product->rating }} dari 5)</span>
                </div>
            </div>

            <!-- Price -->
            <div class="bg-green-50 rounded-2xl p-6">
                <div class="text-4xl font-black text-green-600 mb-2">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>
                <div class="text-gray-600">
                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-check-circle mr-1"></i> Stok Tersedia
                    </span>
                </div>
            </div>

            <!-- Condition -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-bold text-gray-800 mb-3">Kondisi Produk</h3>
                <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-lg font-semibold">
                    @switch($product->condition)
                    @case('like_new')
                    <i class="fas fa-star"></i> Seperti Baru
                    @break
                    @case('good')
                    <i class="fas fa-check"></i> Kondisi Bagus
                    @break
                    @case('fair')
                    <i class="fas fa-exclamation-circle"></i> Cukup Baik
                    @break
                    @default
                    Bagus
                    @endswitch
                </span>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-bold text-gray-800 mb-3">Deskripsi Produk</h3>
                <p class="text-gray-700 leading-relaxed">{{ $product->details }}</p>
            </div>

            <!-- Actions -->
            <div class="flex gap-4">
                <!-- Add to Cart -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-4 rounded-xl transition transform hover:scale-105 shadow-lg">
                        <i class="fas fa-shopping-cart mr-2"></i> Tambah ke Keranjang
                    </button>
                </form>

                <!-- Add to Wishlist -->
                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-white hover:bg-red-50 border-2 border-red-500 text-red-500 font-bold py-4 rounded-xl transition">
                        <i class="fas fa-heart mr-2"></i> Wishlist
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="mt-16">
        <h2 class="text-2xl font-black text-gray-800 mb-8">
            <i class="fas fa-star text-green-600 mr-2"></i> Produk Terkait
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach($relatedProducts as $relatedProduct)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $relatedProduct->image_01) }}" alt="{{ $relatedProduct->name }}" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 right-4">
                        <form action="{{ route('wishlist.add', $relatedProduct->id) }}" method="POST" style="display: none;" id="wishlistForm{{ $relatedProduct->id }}">
                            @csrf
                        </form>
                        <button class="bg-white hover:bg-red-500 hover:text-white text-gray-700 p-3 rounded-full shadow-lg transition transform hover:scale-110" onclick="event.preventDefault(); document.getElementById('wishlistForm{{ $relatedProduct->id }}').submit();">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <a href="{{ route('product.show', $relatedProduct->id) }}" class="text-lg font-bold text-gray-800 mb-2 group-hover:text-green-600 transition line-clamp-2 hover:underline">
                        {{ $relatedProduct->name }}
                    </a>
                    <div class="flex items-center justify-between border-t pt-4">
                        <div class="text-2xl font-black text-green-600">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</div>
                        <form action="{{ route('cart.add', $relatedProduct->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white p-3 rounded-xl transition transform hover:scale-110 shadow-lg">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection