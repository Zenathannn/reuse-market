@extends('layouts.app')

@section('title', 'Pesanan Saya - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-blue-600 to-cyan-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-blue-200 transition">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Pesanan Saya</span>
        </nav>
        <h1 class="text-4xl font-black">Pesanan Saya</h1>
        <p class="text-blue-100 mt-2">Lacak dan kelola semua pesanan Anda di sini</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter Tabs -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex flex-wrap gap-3">
            <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-700 text-white font-bold rounded-xl shadow-lg">
                <i class="fas fa-list mr-2"></i> Semua ({{ $orders->count() ?? 0 }})
            </button>
            <button class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-xl transition">
                <i class="fas fa-clock mr-2"></i> Menunggu
            </button>
            <button class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-xl transition">
                <i class="fas fa-box mr-2"></i> Diproses
            </button>
            <button class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-xl transition">
                <i class="fas fa-truck mr-2"></i> Dikirim
            </button>
            <button class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-xl transition">
                <i class="fas fa-check-circle mr-2"></i> Selesai
            </button>
        </div>
    </div>

    @if(isset($orders) && $orders->count() > 0)
    <div class="space-y-6">
        @foreach($orders as $order)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
            <!-- Order Header -->
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-b-2 border-blue-200 p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            <h3 class="text-xl font-bold text-gray-800">
                                <i class="fas fa-hashtag text-blue-600"></i> Order #{{ $order->id }}
                            </h3>
                            @php
                            $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
                            'processing' => 'bg-blue-100 text-blue-700 border-blue-300',
                            'shipped' => 'bg-purple-100 text-purple-700 border-purple-300',
                            'completed' => 'bg-green-100 text-green-700 border-green-300',
                            'cancelled' => 'bg-red-100 text-red-700 border-red-300',
                            ];
                            $statusIcons = [
                            'pending' => 'fa-clock',
                            'processing' => 'fa-box',
                            'shipped' => 'fa-truck',
                            'completed' => 'fa-check-circle',
                            'cancelled' => 'fa-times-circle',
                            ];
                            $statusText = [
                            'pending' => 'Menunggu Pembayaran',
                            'processing' => 'Diproses',
                            'shipped' => 'Dikirim',
                            'completed' => 'Selesai',
                            'cancelled' => 'Dibatalkan',
                            ];
                            $status = $order->payment_status ?? 'pending';
                            @endphp
                            <span class="px-4 py-1.5 {{ $statusColors[$status] ?? $statusColors['pending'] }} border-2 rounded-full text-sm font-bold">
                                <i class="fas {{ $statusIcons[$status] ?? $statusIcons['pending'] }} mr-1"></i>
                                {{ $statusText[$status] ?? 'Pending' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $order->placed_on ? $order->placed_on->format('d M Y, H:i') : '-' }}
                        </p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-600 mb-1">Total Pembayaran</div>
                        <div class="text-3xl font-black text-blue-600">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Body -->
            <div class="p-6">
                <!-- Products -->
                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 mb-4">
                        <i class="fas fa-box-open text-blue-600 mr-2"></i> Produk
                    </h4>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-gray-700">{{ $order->total_products }}</p>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-bold text-gray-800 mb-3">
                            <i class="fas fa-user text-blue-600 mr-2"></i> Informasi Penerima
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-4 space-y-2">
                            <p class="text-gray-700"><span class="font-semibold">Nama:</span> {{ $order->name }}</p>
                            <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $order->email }}</p>
                            <p class="text-gray-700"><span class="font-semibold">No. HP:</span> {{ $order->number }}</p>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-3">
                            <i class="fas fa-map-marker-alt text-blue-600 mr-2"></i> Alamat Pengiriman
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-gray-700">{{ $order->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 mb-3">
                        <i class="fas fa-credit-card text-blue-600 mr-2"></i> Metode Pembayaran
                    </h4>
                    <div class="bg-gray-50 rounded-xl p-4">
                        @php
                        $methodText = [
                        'cash' => 'Cash on Delivery (COD)',
                        'transfer' => 'Transfer Bank',
                        'credit_card' => 'Kartu Kredit',
                        ];
                        @endphp
                        <p class="text-gray-700 font-semibold">
                            {{ $methodText[$order->method] ?? $order->method }}
                        </p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('orders.show', $order->id) }}" class="flex-1 min-w-[200px] bg-gradient-to-r from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800 text-white text-center font-bold py-3 rounded-xl transition">
                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                    </a>

                    @if($status == 'pending')
                    <button class="flex-1 min-w-[200px] bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition">
                        <i class="fas fa-money-bill mr-2"></i> Bayar Sekarang
                    </button>
                    @endif

                    @if($status == 'shipped')
                    <button class="flex-1 min-w-[200px] bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 rounded-xl transition">
                        <i class="fas fa-truck mr-2"></i> Lacak Pengiriman
                    </button>
                    @endif

                    @if($status == 'completed')
                    <button class="flex-1 min-w-[200px] bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 rounded-xl transition">
                        <i class="fas fa-star mr-2"></i> Beri Ulasan
                    </button>
                    @endif

                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-6 py-3 rounded-xl transition">
                        <i class="fas fa-headset mr-2"></i> Bantuan
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <!-- Empty Orders -->
    <div class="max-w-2xl mx-auto text-center py-20">
        <div class="bg-white rounded-3xl shadow-2xl p-12">
            <div class="mb-8">
                <i class="fas fa-box-open text-8xl text-gray-300"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-800 mb-4">Belum Ada Pesanan</h2>
            <p class="text-gray-600 text-lg mb-8">Anda belum melakukan pembelian. Yuk, mulai belanja sekarang!</p>
            <a href="/shop" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800 text-white font-bold px-10 py-4 rounded-xl transition transform hover:scale-105 shadow-xl">
                <i class="fas fa-shopping-bag mr-3"></i> Mulai Belanja
            </a>
        </div>
    </div>
    @endif
</div>

<!-- Help Section -->
<div class="bg-gradient-to-r from-blue-600 to-cyan-700 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center text-white">
            <h3 class="text-3xl font-black mb-4">Butuh Bantuan?</h3>
            <p class="text-xl text-blue-100 mb-6">Tim customer service kami siap membantu Anda 24/7</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/contact" class="bg-white text-blue-600 hover:bg-blue-50 font-bold px-8 py-4 rounded-xl transition">
                    <i class="fas fa-envelope mr-2"></i> Hubungi Kami
                </a>
                <a href="#" class="bg-white/20 hover:bg-white/30 text-white font-bold px-8 py-4 rounded-xl transition">
                    <i class="fas fa-question-circle mr-2"></i> FAQ
                </a>
            </div>
        </div>
    </div>
</div>
@endsection