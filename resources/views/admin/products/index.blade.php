@extends('layouts.app')

@section('title', 'Kelola Produk - Admin ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-purple-200 transition"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Admin</span>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Kelola Produk</span>
        </nav>
        <h1 class="text-4xl font-black">Kelola Produk</h1>
        <p class="text-purple-100 mt-2">Tambah, edit, dan hapus produk untuk dijual</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header with Add Button -->
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-black text-gray-800">
            <i class="fas fa-box text-purple-600 mr-2"></i> Daftar Produk
        </h2>
        <a href="{{ route('admin.products.create') }}" class="bg-gradient-to-r from-purple-600 to-indigo-700 hover:from-purple-700 hover:to-indigo-800 text-white font-bold px-6 py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-8">
        <form method="GET" action="{{ route('admin.products.index') }}" class="flex gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama atau deskripsi produk..." class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
            </div>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-6 py-3 rounded-xl transition">
                <i class="fas fa-search mr-2"></i> Cari
            </button>
        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        @if($products->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white">
                        <th class="px-6 py-4 text-left font-bold">Gambar</th>
                        <th class="px-6 py-4 text-left font-bold">Nama Produk</th>
                        <th class="px-6 py-4 text-left font-bold">Harga</th>
                        <th class="px-6 py-4 text-left font-bold">Kondisi</th>
                        <th class="px-6 py-4 text-left font-bold">Rating</th>
                        <th class="px-6 py-4 text-center font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $product->image_01) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg">
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <div class="font-bold text-gray-800">{{ $product->name }}</div>
                                <div class="text-sm text-gray-500 line-clamp-1">{{ $product->details }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-purple-600">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                @switch($product->condition)
                                    @case('like_new')
                                        Seperti Baru
                                    @break
                                    @case('good')
                                        Bagus
                                    @break
                                    @case('fair')
                                        Cukup Baik
                                    @break
                                @endswitch
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <span class="ml-2 font-bold text-gray-800">{{ $product->rating }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition transform hover:scale-110" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" class="inline" id="deleteForm{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openConfirmModal('Hapus Produk', 'Yakin ingin menghapus <strong>{{ $product->name }}</strong>?', function() { document.getElementById('deleteForm{{ $product->id }}').submit(); })" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition transform hover:scale-110" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $products->links('pagination::tailwind') }}
        </div>
        @else
        <div class="text-center py-12">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-600 mb-2">Tidak Ada Produk</h3>
            <p class="text-gray-500 mb-6">Mulai dengan menambahkan produk baru</p>
            <a href="{{ route('admin.products.create') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold px-6 py-3 rounded-xl transition">
                <i class="fas fa-plus mr-2"></i> Tambah Produk Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
