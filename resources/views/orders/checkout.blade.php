@extends('layouts.app')

@section('title', 'Checkout - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-green-200 transition"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="/cart" class="hover:text-green-200 transition">Keranjang</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Checkout</span>
        </nav>
        <h1 class="text-4xl font-black">Checkout</h1>
        <p class="text-green-100 mt-2">Lengkapi data pengiriman Anda</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Progress Steps -->
    <div class="mb-12">
        <div class="flex items-center justify-center">
            <div class="flex items-center">
                <div class="flex items-center">
                    <div class="bg-green-600 text-white w-10 h-10 rounded-full flex items-center justify-center font-bold">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="ml-2 font-bold text-green-600">Cart</span>
                </div>
                <div class="w-24 h-1 bg-green-600 mx-4"></div>
                <div class="flex items-center">
                    <div class="bg-green-600 text-white w-10 h-10 rounded-full flex items-center justify-center font-bold">2</div>
                    <span class="ml-2 font-bold text-green-600">Checkout</span>
                </div>
                <div class="w-24 h-1 bg-gray-300 mx-4"></div>
                <div class="flex items-center">
                    <div class="bg-gray-300 text-gray-600 w-10 h-10 rounded-full flex items-center justify-center font-bold">3</div>
                    <span class="ml-2 text-gray-600">Payment</span>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Shipping Information -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-shipping-fast text-green-600 mr-2"></i>
                        Informasi Pengiriman
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-user text-green-600 mr-1"></i> Nama Lengkap *
                            </label>
                            <input type="text" name="name" required maxlength="20" value="{{ Auth::user()->name }}"
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                                placeholder="John Doe">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-phone text-green-600 mr-1"></i> Nomor Telepon *
                            </label>
                            <input type="tel" name="number" required maxlength="10"
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                                placeholder="08123456789">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mt-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-envelope text-green-600 mr-1"></i> Email *
                        </label>
                        <input type="email" name="email" required maxlength="50" value="{{ Auth::user()->email }}"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="nama@email.com">
                    </div>

                    <!-- Address -->
                    <div class="mt-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt text-green-600 mr-1"></i> Alamat Lengkap *
                        </label>
                        <textarea name="address" required maxlength="500" rows="4"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none"
                            placeholder="Jl. Contoh No. 123, RT/RW, Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos"></textarea>
                        <p class="text-xs text-gray-500 mt-2">Maksimal 500 karakter</p>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-credit-card text-green-600 mr-2"></i>
                        Metode Pembayaran
                    </h2>

                    <div class="space-y-4">
                        <!-- COD -->
                        <label class="flex items-center p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-green-500 hover:bg-green-50 transition">
                            <input type="radio" name="method" value="cash" required class="w-5 h-5 text-green-600">
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-money-bill-wave text-2xl text-green-600 mr-3"></i>
                                        <div>
                                            <div class="font-bold text-gray-800">Cash on Delivery (COD)</div>
                                            <div class="text-sm text-gray-600">Bayar saat barang diterima</div>
                                        </div>
                                    </div>
                                    <span class="bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full">Populer</span>
                                </div>
                            </div>
                        </label>

                        <!-- Bank Transfer -->
                        <label class="flex items-center p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-green-500 hover:bg-green-50 transition">
                            <input type="radio" name="method" value="transfer" class="w-5 h-5 text-green-600">
                            <div class="ml-4 flex-1">
                                <div class="flex items-center">
                                    <i class="fas fa-university text-2xl text-blue-600 mr-3"></i>
                                    <div>
                                        <div class="font-bold text-gray-800">Transfer Bank</div>
                                        <div class="text-sm text-gray-600">BCA, Mandiri, BNI, BRI</div>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <!-- Credit Card -->
                        <label class="flex items-center p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-green-500 hover:bg-green-50 transition">
                            <input type="radio" name="method" value="credit_card" class="w-5 h-5 text-green-600">
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-credit-card text-2xl text-purple-600 mr-3"></i>
                                        <div>
                                            <div class="font-bold text-gray-800">Kartu Kredit/Debit</div>
                                            <div class="text-sm text-gray-600">Visa, Mastercard, JCB</div>
                                        </div>
                                    </div>
                                    <span class="bg-purple-100 text-purple-600 text-xs font-bold px-3 py-1 rounded-full">Aman</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Notes -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-sticky-note text-green-600 mr-2"></i>
                        Catatan (Opsional)
                    </h2>
                    <textarea rows="3" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none"
                        placeholder="Tambahkan catatan untuk pesanan Anda (contoh: warna, ukuran, dll)"></textarea>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-file-invoice text-green-600 mr-2"></i>
                        Ringkasan Pesanan
                    </h3>

                    <!-- Items -->
                    <div class="space-y-4 mb-6 max-h-60 overflow-y-auto">
                        @foreach($cartItems as $item)
                        <div class="flex items-center space-x-3 pb-4 border-b border-gray-200">
                            <img src="https://via.placeholder.com/80x80/059669/FFFFFF?text=Item" alt="{{ $item->name }}" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-800 text-sm line-clamp-1">{{ $item->name }}</h4>
                                <p class="text-xs text-gray-600">Qty: {{ $item->quantity }}</p>
                                <p class="text-sm font-bold text-green-600">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Calculation -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal ({{ $cartItems->count() }} item)</span>
                            <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Biaya Pengiriman</span>
                            <span class="font-semibold text-green-600">GRATIS</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Biaya Admin</span>
                            <span class="font-semibold">Rp 0</span>
                        </div>
                        <div class="border-t-2 border-gray-200 pt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-gray-800">Total Bayar</span>
                                <span class="text-3xl font-black text-green-600">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-4 rounded-xl transition transform hover:scale-105 shadow-lg mb-3">
                        <i class="fas fa-check-circle mr-2"></i> Buat Pesanan
                    </button>

                    <a href="/cart" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 text-center font-bold py-4 rounded-xl transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Keranjang
                    </a>

                    <!-- Security Info -->
                    <div class="mt-6 p-4 bg-green-50 rounded-xl">
                        <div class="flex items-start text-green-700">
                            <i class="fas fa-shield-alt text-2xl mr-3 mt-1"></i>
                            <div class="text-sm">
                                <div class="font-bold mb-1">100% Aman & Terpercaya</div>
                                <div class="text-green-600">Data Anda dilindungi dengan enkripsi SSL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection