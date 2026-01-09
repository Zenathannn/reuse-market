@extends('layouts.app')

@section('title', 'Wishlist - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-pink-600 to-rose-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-pink-200 transition">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Wishlist</span>
        </nav>
        <h1 class="text-4xl font-black">Wishlist Favorit Anda</h1>
        <p class="text-pink-100 mt-2">Simpan produk yang Anda sukai untuk dibeli nanti</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(isset($wishlistItems) && $wishlistItems->count() > 0)
    <div class="mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">
                    <i class="fas fa-heart text-pink-600 mr-2"></i>
                    {{ $wishlistItems->count() }} Item Favorit
                </h2>
                <button onclick="moveAllToCart()" class="bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold px-6 py-3 rounded-xl transition">
                    <i class="fas fa-shopping-cart mr-2"></i> Pindahkan Semua ke Keranjang
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($wishlistItems as $item)
        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
            <div class="relative">
                <img src="https://via.placeholder.com/400x400/ec4899/FFFFFF?text={{ urlencode($item->name) }}" alt="{{ $item->name }}" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">

                <!-- Remove Button -->
                <form method="POST" action="{{ route('wishlist.remove', $item->id) }}" class="absolute top-4 right-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-white hover:bg-red-500 hover:text-white text-gray-700 p-3 rounded-full shadow-lg transition transform hover:scale-110" onclick="return confirm('Hapus dari wishlist?')">
                        <i class="fas fa-times"></i>
                    </button>
                </form>

                <!-- Badge -->
                <div class="absolute top-4 left-4">
                    <span class="bg-pink-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                        <i class="fas fa-heart mr-1"></i> Favorit
                    </span>
                </div>

                <!-- Quick View -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform">
                    <a href="{{ route('product.show', $item->pid) }}" class="block w-full bg-white hover:bg-gray-100 text-gray-800 text-center font-bold py-3 rounded-lg transition mb-2">
                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                    </a>
                </div>
            </div>

            <div class="p-6">
                <span class="inline-block bg-green-100 text-green-600 text-xs font-semibold px-2 py-1 rounded mb-2">
                    Kondisi Bagus
                </span>
                <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-pink-600 transition">
                    {{ $item->name }}
                </h3>

                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-xs text-gray-500 ml-2">(4.5)</span>
                </div>

                <div class="flex items-center justify-between border-t pt-4">
                    <div>
                        <div class="text-sm text-gray-400 line-through">Rp {{ number_format($item->price * 2, 0, ',', '.') }}</div>
                        <div class="text-2xl font-black text-pink-600">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                    </div>
                    <form method="POST" action="{{ route('cart.add', $item->pid) }}">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white p-3 rounded-xl transition transform hover:scale-110 shadow-lg">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <!-- Empty Wishlist -->
    <div class="max-w-2xl mx-auto text-center py-20">
        <div class="bg-white rounded-3xl shadow-2xl p-12">
            <div class="mb-8">
                <i class="fas fa-heart-broken text-8xl text-gray-300"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-800 mb-4">Wishlist Anda Kosong</h2>
            <p class="text-gray-600 text-lg mb-8">Mulai tambahkan produk favorit Anda ke wishlist!</p>
            <a href="/shop" class="inline-flex items-center bg-gradient-to-r from-pink-600 to-rose-700 hover:from-pink-700 hover:to-rose-800 text-white font-bold px-10 py-4 rounded-xl transition transform hover:scale-105 shadow-xl">
                <i class="fas fa-heart mr-3"></i> Cari Produk Favorit
            </a>
        </div>
    </div>
    @endif
</div>

<!-- Benefits Banner -->
<div class="bg-gradient-to-r from-pink-600 to-rose-700 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center text-white">
            <h3 class="text-3xl font-black mb-4">💝 Kenapa Pakai Wishlist?</h3>
            <div class="grid md:grid-cols-3 gap-8 mt-8">
                <div>
                    <i class="fas fa-bookmark text-4xl mb-3"></i>
                    <h4 class="font-bold text-lg mb-2">Simpan Favorit</h4>
                    <p class="text-pink-100">Tandai produk yang Anda suka untuk dibeli nanti</p>
                </div>
                <div>
                    <i class="fas fa-bell text-4xl mb-3"></i>
                    <h4 class="font-bold text-lg mb-2">Dapat Notifikasi</h4>
                    <p class="text-pink-100">Dapatkan update jika ada diskon atau promo</p>
                </div>
                <div>
                    <i class="fas fa-gift text-4xl mb-3"></i>
                    <h4 class="font-bold text-lg mb-2">Share ke Teman</h4>
                    <p class="text-pink-100">Bagikan wishlist Anda ke teman & keluarga</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function moveAllToCart() {
        if (confirm('Pindahkan semua item ke keranjang?')) {
            // Implementation untuk move all
            alert('Fitur ini akan segera tersedia!');
        }
    }
</script>
@endsection