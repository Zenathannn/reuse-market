@extends('layouts.app')

@section('title', 'Keranjang Belanja - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-green-200 transition">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Keranjang Belanja</span>
        </nav>
        <h1 class="text-4xl font-black">Keranjang Belanja Anda</h1>
        <p class="text-green-100 mt-2">Tinjau dan kelola produk yang akan Anda beli</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(isset($cartItems) && $cartItems->count() > 0)
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2 space-y-4">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-shopping-cart text-green-600 mr-2"></i>
                        Item di Keranjang ({{ $cartItems->count() }})
                    </h2>
                    <form method="POST" action="{{ route('cart.clear') }}" onsubmit="return confirm('Yakin ingin mengosongkan keranjang?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold transition">
                            <i class="fas fa-trash mr-1"></i> Kosongkan
                        </button>
                    </form>
                </div>
            </div>

            @foreach($cartItems as $item)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                <div class="flex flex-col md:flex-row">
                    <!-- Image -->
                    <div class="md:w-48 flex-shrink-0">
                        <img src="https://via.placeholder.com/300x300/059669/FFFFFF?text={{ urlencode($item->name) }}" alt="{{ $item->name }}" class="w-full h-48 md:h-full object-cover">
                    </div>

                    <!-- Content -->
                    <div class="flex-1 p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                <span class="inline-block bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    Kondisi Bagus
                                </span>
                            </div>
                            <form method="POST" action="{{ route('cart.remove', $item->id) }}" onsubmit="return confirm('Hapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-600 transition p-2">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </form>
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <!-- Price -->
                            <div>
                                <div class="text-2xl font-black text-green-600">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </div>
                                <div class="text-sm text-gray-500">Per item</div>
                            </div>

                            <!-- Quantity -->
                            <div class="flex items-center space-x-3">
                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="quantity" value="{{ max(1, $item->quantity - 1) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-10 h-10 rounded-lg font-bold transition">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border-2 border-gray-300 rounded-lg py-2 font-bold" readonly>
                                    <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-10 h-10 rounded-lg font-bold transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Subtotal -->
                            <div class="text-right">
                                <div class="text-sm text-gray-500 mb-1">Subtotal</div>
                                <div class="text-2xl font-black text-gray-800">
                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-file-invoice text-green-600 mr-2"></i>
                    Ringkasan Belanja
                </h3>

                <div class="space-y-4 mb-6">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal ({{ $cartItems->count() }} item)</span>
                        <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Biaya Pengiriman</span>
                        <span class="font-semibold text-green-600">GRATIS</span>
                    </div>
                    <div class="border-t-2 border-gray-200 pt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">Total</span>
                            <span class="text-3xl font-black text-green-600">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('checkout') }}" class="block w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white text-center font-bold py-4 rounded-xl transition transform hover:scale-105 shadow-lg mb-3">
                    <i class="fas fa-credit-card mr-2"></i> Lanjut ke Checkout
                </a>

                <a href="/shop" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 text-center font-bold py-4 rounded-xl transition">
                    <i class="fas fa-shopping-bag mr-2"></i> Lanjut Belanja
                </a>

                <!-- Promo Code -->
                <div class="mt-6 pt-6 border-t-2 border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kode Promo</label>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Masukkan kode" class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-bold transition">
                            Pakai
                        </button>
                    </div>
                </div>

                <!-- Security Badge -->
                <div class="mt-6 p-4 bg-green-50 rounded-xl">
                    <div class="flex items-center text-green-700">
                        <i class="fas fa-shield-alt text-2xl mr-3"></i>
                        <div class="text-sm">
                            <div class="font-bold">Pembayaran Aman</div>
                            <div>Transaksi dilindungi 100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
    <!-- Empty Cart -->
    <div class="max-w-2xl mx-auto text-center py-20">
        <div class="bg-white rounded-3xl shadow-2xl p-12">
            <div class="mb-8">
                <i class="fas fa-shopping-cart text-8xl text-gray-300"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-800 mb-4">Keranjang Belanja Kosong</h2>
            <p class="text-gray-600 text-lg mb-8">Yuk, mulai belanja dan temukan produk favorit Anda!</p>
            <a href="/shop" class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold px-10 py-4 rounded-xl transition transform hover:scale-105 shadow-xl">
                <i class="fas fa-shopping-bag mr-3"></i> Mulai Belanja
            </a>
        </div>
    </div>
    @endif
</div>

<!-- Trust Badges -->
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
                <h4 class="font-bold text-lg">Pembayaran Aman</h4>
                <p class="text-sm text-green-100">100% Terjamin</p>
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