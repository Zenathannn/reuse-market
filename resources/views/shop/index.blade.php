@extends('layouts.app')

@section('title', 'Belanja - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="/" class="hover:text-green-200 transition">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Belanja</span>
        </nav>
        <h1 class="text-4xl font-black mt-4">Katalog Produk</h1>
        <p class="text-green-100 mt-2">Temukan barang bekas berkualitas dengan harga terbaik</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar Filter -->
        <div class="lg:w-1/4">
            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-filter text-green-600 mr-2"></i> Filter Produk
                </h3>

                <!-- Search -->
                <form method="GET" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Produk</label>
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            <i class="fas fa-search absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Rentang Harga</label>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="price" value="all" {{ !request('price') || request('price') == 'all' ? 'checked' : '' }} class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">Semua Harga</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="price" value="0-500000" {{ request('price') == '0-500000' ? 'checked' : '' }} class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">
                                    < Rp 500.000</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="price" value="500000-1000000" {{ request('price') == '500000-1000000' ? 'checked' : '' }} class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">Rp 500.000 - 1 Juta</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="price" value="1000000-5000000" {{ request('price') == '1000000-5000000' ? 'checked' : '' }} class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">Rp 1 Juta - 5 Juta</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="price" value="5000000" {{ request('price') == '5000000' ? 'checked' : '' }} class="w-4 h-4 text-green-600">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">> Rp 5 Juta</span>
                            </label>
                        </div>
                    </div>

                    <!-- Condition -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Kondisi</label>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="condition[]" value="like_new" class="w-4 h-4 text-green-600 rounded">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">Seperti Baru</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="condition[]" value="good" class="w-4 h-4 text-green-600 rounded">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">Bagus</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="condition[]" value="fair" class="w-4 h-4 text-green-600 rounded">
                                <span class="ml-2 text-gray-700 group-hover:text-green-600 transition">Cukup Baik</span>
                            </label>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="space-y-2 pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                            <i class="fas fa-search mr-2"></i> Terapkan Filter
                        </button>
                        <a href="/shop" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-xl text-center transition">
                            <i class="fas fa-redo mr-2"></i> Reset Filter
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="lg:w-3/4">
            <!-- Toolbar -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-semibold">Menampilkan <span class="text-green-600">6</span> dari <span class="text-green-600">24</span> produk</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <label class="text-gray-700 font-semibold">Urutkan:</label>
                        <select name="sort" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            <option value="newest">Terbaru</option>
                            <option value="price_low">Harga Terendah</option>
                            <option value="price_high">Harga Tertinggi</option>
                            <option value="popular">Terpopuler</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover-lift cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x400/059669/FFFFFF?text=Product+{{ $i }}" alt="Product {{ $i }}" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 space-y-2">
                            @if($i % 2 == 0)
                            <span class="block bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                <i class="fas fa-fire mr-1"></i> Hot Deal
                            </span>
                            @endif
                            <span class="block bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                Kondisi Bagus
                            </span>
                        </div>
                        <div class="absolute top-4 right-4 space-y-2">
                            <button class="bg-white hover:bg-red-500 hover:text-white text-gray-700 p-3 rounded-full shadow-lg transition transform hover:scale-110">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white hover:bg-blue-500 hover:text-white text-gray-700 p-3 rounded-full shadow-lg transition transform hover:scale-110">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <!-- Quick Add -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform">
                            <button class="w-full bg-white hover:bg-green-600 text-green-600 hover:text-white font-bold py-3 rounded-lg transition">
                                <i class="fas fa-cart-plus mr-2"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500">Kategori Produk</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <span class="text-xs font-semibold text-gray-600 ml-1">4.{{ $i }}</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-green-600 transition line-clamp-2">Nama Produk Berkualitas Premium {{ $i }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Deskripsi singkat produk yang menarik dan menjelaskan kondisi barang dengan detail</p>
                        <div class="flex items-center justify-between border-t pt-4">
                            <div>
                                <div class="text-sm text-gray-400 line-through">Rp {{ number_format(200000 * $i, 0, ',', '.') }}</div>
                                <div class="text-2xl font-black text-green-600">Rp {{ number_format(100000 * $i, 0, ',', '.') }}</div>
                            </div>
                            <button class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white p-3 rounded-xl transition transform hover:scale-110 shadow-lg">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
            </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-lg shadow-lg">1</button>
                <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">2</button>
                <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">3</button>
                <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>
    </div>
</div>
</div>

<!-- Benefits Banner -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-4 gap-8 text-white text-center">
            <div class="flex flex-col items-center">
                <i class="fas fa-truck text-4xl mb-3"></i>
                <h4 class="font-bold text-lg">Gratis Ongkir</h4>
                <p class="text-sm text-green-100">Min. belanja Rp 100.000</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-shield-alt text-4xl mb-3"></i>
                <h4 class="font-bold text-lg">Barang Terjamin</h4>
                <p class="text-sm text-green-100">100% Original & Layak</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-undo text-4xl mb-3"></i>
                <h4 class="font-bold text-lg">Mudah Dikembalikan</h4>
                <p class="text-sm text-green-100">Dalam 7 hari</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-headset text-4xl mb-3"></i>
                <h4 class="font-bold text-lg">Support 24/7</h4>
                <p class="text-sm text-green-100">Siap membantu Anda</p>
            </div>
        </div>
    </div>
</div>
@endsection