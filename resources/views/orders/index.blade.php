@extends('layouts.app')

@section('title', 'Pesanan Saya - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-green-200 transition">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Pesanan Saya</span>
        </nav>
        <h1 class="text-4xl font-black">Pesanan Saya</h1>
        <p class="text-green-100 mt-2">Lacak dan kelola semua pesanan Anda di sini</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter Tabs -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('orders') }}?status=all" class="px-6 py-3 {{ $status === 'all' ? 'bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-lg' : 'bg-green-100 hover:bg-green-200 text-green-700' }} font-bold rounded-xl transition">
                <i class="fas fa-list mr-2"></i> Semua ({{ $statusCounts['all'] ?? 0 }})
            </a>
            <a href="{{ route('orders') }}?status=pending" class="px-6 py-3 {{ $status === 'pending' ? 'bg-gradient-to-r from-yellow-400 to-yellow-500 text-white shadow-lg' : 'bg-yellow-100 hover:bg-yellow-200 text-yellow-700' }} font-bold rounded-xl transition">
                <i class="fas fa-clock mr-2"></i> Menunggu ({{ $statusCounts['pending'] ?? 0 }})
            </a>
            <a href="{{ route('orders') }}?status=processing" class="px-6 py-3 {{ $status === 'processing' ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : 'bg-blue-100 hover:bg-blue-200 text-blue-700' }} font-bold rounded-xl transition">
                <i class="fas fa-box mr-2"></i> Diproses ({{ $statusCounts['processing'] ?? 0 }})
            </a>
            <a href="{{ route('orders') }}?status=shipped" class="px-6 py-3 {{ $status === 'shipped' ? 'bg-gradient-to-r from-purple-600 to-purple-700 text-white shadow-lg' : 'bg-purple-100 hover:bg-purple-200 text-purple-700' }} font-bold rounded-xl transition">
                <i class="fas fa-truck mr-2"></i> Dikirim ({{ $statusCounts['shipped'] ?? 0 }})
            </a>
            <a href="{{ route('orders') }}?status=completed" class="px-6 py-3 {{ $status === 'completed' ? 'bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-lg' : 'bg-green-100 hover:bg-green-200 text-green-700' }} font-bold rounded-xl transition">
                <i class="fas fa-check-circle mr-2"></i> Selesai ({{ $statusCounts['completed'] ?? 0 }})
            </a>
        </div>
    </div>

    @if(isset($orders) && $orders->count() > 0)
    <div class="space-y-6">
        @foreach($orders as $order)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
            <!-- Order Header -->
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-b-2 border-green-200 p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            <h3 class="text-xl font-bold text-gray-800">
                                <i class="fas fa-hashtag text-green-600"></i> Order #{{ $order->id }}
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
                            $status_order = $order->payment_status ?? 'pending';
                            @endphp
                            <span class="px-4 py-1.5 {{ $statusColors[$status_order] ?? $statusColors['pending'] }} border-2 rounded-full text-sm font-bold">
                                <i class="fas {{ $statusIcons[$status_order] ?? $statusIcons['pending'] }} mr-1"></i>
                                {{ $statusText[$status_order] ?? 'Pending' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $order->placed_on ? $order->placed_on->format('d M Y, H:i') : '-' }}
                        </p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-600 mb-1">Total Pembayaran</div>
                        <div class="text-3xl font-black text-green-600">
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
                        <i class="fas fa-box-open text-green-600 mr-2"></i> Produk
                    </h4>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-gray-700">{{ $order->total_products }}</p>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-bold text-gray-800 mb-3">
                            <i class="fas fa-user text-green-600 mr-2"></i> Informasi Penerima
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-4 space-y-2">
                            <p class="text-gray-700"><span class="font-semibold">Nama:</span> {{ $order->name }}</p>
                            <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $order->email }}</p>
                            <p class="text-gray-700"><span class="font-semibold">No. HP:</span> {{ $order->number }}</p>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-3">
                            <i class="fas fa-map-marker-alt text-green-600 mr-2"></i> Alamat Pengiriman
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-gray-700">{{ $order->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 mb-3">
                        <i class="fas fa-credit-card text-green-600 mr-2"></i> Metode Pembayaran
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
                    <a href="{{ route('orders.show', $order->id) }}" class="flex-1 min-w-[200px] bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white text-center font-bold py-3 rounded-xl transition">
                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                    </a>

                    @php $status_order = $order->payment_status ?? 'pending'; @endphp
                    @if($status_order == 'pending')
                    <button class="flex-1 min-w-[200px] bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition" onclick="openModal('Pembayaran', 'Silakan lakukan pembayaran melalui metode yang dipilih.')">
                        <i class="fas fa-money-bill mr-2"></i> Bayar Sekarang
                    </button>
                    @endif

                    @if($status_order == 'processing')
                    <button class="flex-1 min-w-[200px] bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 rounded-xl transition" onclick="openModal('Status Pesanan', 'Pesanan sedang diproses. Estimasi pengiriman 2-3 hari kerja.')">
                        <i class="fas fa-hourglass mr-2"></i> Dalam Proses
                    </button>
                    @endif

                    @if($status_order == 'shipped')
                    <button class="flex-1 min-w-[200px] bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 rounded-xl transition" onclick="openModal('Lacak Pengiriman', 'Nomor resi: JNE-123456789<br>Lacak di: <strong>jne.co.id</strong>')">
                        <i class="fas fa-truck mr-2"></i> Lacak Pengiriman
                    </button>
                    @endif

                    @if($status_order == 'completed')
                    <button class="flex-1 min-w-[200px] bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 rounded-xl transition" onclick="openModal('Beri Ulasan', 'Terima kasih telah berbelanja! Silakan berikan ulasan untuk produk ini.')">
                        <i class="fas fa-star mr-2"></i> Beri Ulasan
                    </button>
                    @endif

                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-6 py-3 rounded-xl transition" onclick="openModal('Bantuan', 'Hubungi customer service kami di:<br><strong>+62 (21) 1234-5678</strong>')">
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
            <a href="/shop" class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold px-10 py-4 rounded-xl transition transform hover:scale-105 shadow-xl">
                <i class="fas fa-shopping-bag mr-3"></i> Mulai Belanja
            </a>
        </div>
    </div>
    @endif
</div>

<!-- Help Section -->
<div class="bg-gradient-to-r from-green-600 to-emerald-700 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center text-white">
            <h3 class="text-3xl font-black mb-4">Butuh Bantuan?</h3>
            <p class="text-xl text-green-100 mb-6">Tim customer service kami siap membantu Anda 24/7</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/contact" class="bg-white text-green-600 hover:bg-green-50 font-bold px-8 py-4 rounded-xl transition">
                    <i class="fas fa-envelope mr-2"></i> Hubungi Kami
                </a>
                <a href="#" class="bg-white/20 hover:bg-white/30 text-white font-bold px-8 py-4 rounded-xl transition">
                    <i class="fas fa-question-circle mr-2"></i> FAQ
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection