@extends('layouts.app')

@section('title', 'ReUse Market - Barang Bekas Berkualitas')

@section('content')
<style>
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes pulse-slow {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .pulse-slow {
        animation: pulse-slow 2s ease-in-out infinite;
    }
</style>

<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-br from-green-600 via-green-700 to-emerald-800 text-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="space-y-8 animate-fade-in">
                <div class="inline-block">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-semibold">
                        <i class="fas fa-star text-yellow-300 mr-1"></i> Platform #1 Barang Bekas
                    </span>
                </div>
                <h1 class="text-5xl md:text-7xl font-black leading-tight">
                    Berikan Kehidupan <span class="text-yellow-300">Kedua</span> untuk Barang Berkualitas
                </h1>
                <p class="text-xl md:text-2xl text-green-100 leading-relaxed">
                    Belanja barang bekas layak pakai dengan harga terjangkau. Hemat uang, selamatkan bumi!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="/shop" class="group bg-white text-green-600 hover:bg-green-50 px-8 py-4 rounded-xl text-lg font-bold transition transform hover:scale-105 shadow-2xl flex items-center justify-center">
                        <i class="fas fa-shopping-bag mr-3 group-hover:rotate-12 transition-transform"></i>
                        Mulai Belanja
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform"></i>
                    </a>
                    <a href="/about" class="bg-transparent border-3 border-white hover:bg-white hover:text-green-600 px-8 py-4 rounded-xl text-lg font-bold transition transform hover:scale-105 flex items-center justify-center shadow-2xl">
                        <i class="fas fa-info-circle mr-3"></i> Pelajari Lebih Lanjut
                    </a>
                </div>
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="text-center">
                        <div class="text-3xl font-black text-yellow-300">500+</div>
                        <div class="text-sm text-green-100 mt-1">Produk</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-black text-yellow-300">1K+</div>
                        <div class="text-sm text-green-100 mt-1">Pelanggan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-black text-yellow-300">5K+</div>
                        <div class="text-sm text-green-100 mt-1">Transaksi</div>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative float-animation hidden md:block">
                <div class="relative z-10">
                    <img src="https://via.placeholder.com/600x600/10b981/FFFFFF?text=ReUse+Market" alt="Hero" class="rounded-3xl shadow-2xl">
                    <!-- Floating Icons -->
                    <div class="absolute -top-6 -left-6 bg-white text-green-600 p-4 rounded-2xl shadow-2xl pulse-slow">
                        <i class="fas fa-recycle text-3xl"></i>
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-yellow-400 text-white p-4 rounded-2xl shadow-2xl pulse-slow">
                        <i class="fas fa-heart text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave decoration -->
    <div class="absolute bottom-0 left-0 right-0 bottom-[-165px]">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
            <path fill="#f9fafb" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>

<!-- Features Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16">
        <span class="text-green-600 font-bold text-lg">Keunggulan Kami</span>
        <h2 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 mt-2">Mengapa Memilih ReUse Market?</h2>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">Solusi cerdas untuk belanja hemat dan ramah lingkungan dengan jaminan kualitas terbaik</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="group bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl hover-lift border-2 border-transparent hover:border-green-500 transition cursor-pointer">
            <div class="bg-gradient-to-br from-green-500 to-emerald-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                <i class="fas fa-check-circle text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-600 transition">Barang Terjamin</h3>
            <p class="text-gray-600 leading-relaxed">Semua produk telah diverifikasi dan dipastikan masih layak pakai dengan kualitas terbaik.</p>
            <div class="mt-6 flex items-center text-green-600 font-semibold group-hover:translate-x-2 transition-transform">
                Pelajari lebih lanjut <i class="fas fa-arrow-right ml-2"></i>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="group bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl hover-lift border-2 border-transparent hover:border-blue-500 transition cursor-pointer">
            <div class="bg-gradient-to-br from-blue-500 to-cyan-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                <i class="fas fa-tag text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition">Harga Terjangkau</h3>
            <p class="text-gray-600 leading-relaxed">Dapatkan barang berkualitas dengan harga jauh lebih murah hingga 70% dari harga baru.</p>
            <div class="mt-6 flex items-center text-blue-600 font-semibold group-hover:translate-x-2 transition-transform">
                Lihat penawaran <i class="fas fa-arrow-right ml-2"></i>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="group bg-gradient-to-br from-yellow-50 to-amber-50 p-8 rounded-2xl hover-lift border-2 border-transparent hover:border-yellow-500 transition cursor-pointer">
            <div class="bg-gradient-to-br from-yellow-500 to-amber-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                <i class="fas fa-leaf text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-yellow-600 transition">Ramah Lingkungan</h3>
            <p class="text-gray-600 leading-relaxed">Berkontribusi mengurangi sampah dan mendukung ekonomi sirkular untuk bumi yang lebih hijau.</p>
            <div class="mt-6 flex items-center text-yellow-600 font-semibold group-hover:translate-x-2 transition-transform">
                Kontribusi Anda <i class="fas fa-arrow-right ml-2"></i>
            </div>
        </div>
    </div>
</div>

<!-- Products Section -->
<div class="bg-gradient-to-br from-gray-50 to-green-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-green-600 font-bold text-lg">Produk Pilihan</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 mt-2">Produk Unggulan Kami</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Pilihan terbaik barang bekas berkualitas dengan harga spesial</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 1; $i <= 4; $i++)
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover-lift cursor-pointer">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x400/059669/FFFFFF?text=Product+{{ $i }}" alt="Product {{ $i }}" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <!-- Badges -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                            -50%
                        </span>
                    </div>
                    <div class="absolute top-4 right-4 space-y-2">
                        <button class="bg-white hover:bg-red-500 hover:text-white text-gray-700 p-3 rounded-full shadow-lg transition transform hover:scale-110">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button class="bg-white hover:bg-green-500 hover:text-white text-gray-700 p-3 rounded-full shadow-lg transition transform hover:scale-110">
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
                    <div class="flex items-center mb-2">
                        <span class="bg-green-100 text-green-600 text-xs font-semibold px-2 py-1 rounded">Kondisi Bagus</span>
                        <div class="ml-auto flex items-center text-yellow-400">
                            <i class="fas fa-star text-sm"></i>
                            <span class="text-xs font-semibold text-gray-600 ml-1">4.8</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-green-600 transition line-clamp-2">Nama Produk Berkualitas {{ $i }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Kondisi sangat baik, masih layak pakai untuk kebutuhan sehari-hari</p>
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

    <div class="text-center mt-12">
        <a href="/shop" class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-10 py-4 rounded-xl text-lg font-bold transition transform hover:scale-105 shadow-2xl">
            Lihat Semua Produk
            <i class="fas fa-arrow-right ml-3"></i>
        </a>
    </div>
</div>
</div>

<!-- How It Works -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16">
        <span class="text-green-600 font-bold text-lg">Cara Kerja</span>
        <h2 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 mt-2">Belanja dalam 3 Langkah Mudah</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center group">
            <div class="relative inline-block mb-6">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-search text-4xl text-white"></i>
                </div>
                <div class="absolute -top-2 -right-2 bg-yellow-400 text-white font-black text-xl w-10 h-10 rounded-full flex items-center justify-center shadow-lg">1</div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Cari Produk</h3>
            <p class="text-gray-600">Browse ribuan produk berkualitas dengan harga terjangkau</p>
        </div>

        <div class="text-center group">
            <div class="relative inline-block mb-6">
                <div class="bg-gradient-to-br from-blue-500 to-cyan-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-shopping-cart text-4xl text-white"></i>
                </div>
                <div class="absolute -top-2 -right-2 bg-yellow-400 text-white font-black text-xl w-10 h-10 rounded-full flex items-center justify-center shadow-lg">2</div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Tambah ke Keranjang</h3>
            <p class="text-gray-600">Pilih produk favorit dan masukkan ke keranjang belanja</p>
        </div>

        <div class="text-center group">
            <div class="relative inline-block mb-6">
                <div class="bg-gradient-to-br from-purple-500 to-pink-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-credit-card text-4xl text-white"></i>
                </div>
                <div class="absolute -top-2 -right-2 bg-yellow-400 text-white font-black text-xl w-10 h-10 rounded-full flex items-center justify-center shadow-lg">3</div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Checkout & Bayar</h3>
            <p class="text-gray-600">Selesaikan pembayaran dan barang akan dikirim ke alamat Anda</p>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="bg-gradient-to-br from-green-600 to-emerald-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-green-200 font-bold text-lg">Testimoni</span>
            <h2 class="text-4xl md:text-5xl font-black mb-4 mt-2">
                Apa Kata Pelanggan Kami?
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Testimoni 1 -->
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl hover:bg-white/20 transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                </div>

                <p class="text-green-50 text-lg mb-6 leading-relaxed">
                    "Sangat puas! Barangnya bagus dan harganya terjangkau. Pengiriman juga cepat. Recommended banget!"
                </p>

                <div class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name=Rama+Nugraha&background=059669&color=fff"
                        alt="User"
                        class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="font-bold">Rama Nugraha</div>
                        <div class="text-sm text-green-200">Pembeli Aktif</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl hover:bg-white/20 transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                </div>

                <p class="text-green-50 text-lg mb-6 leading-relaxed">
                    "Pelayanan cepat, respon penjual ramah, dan kualitas barang sesuai ekspektasi. Mantap banget!"
                </p>

                <div class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name=Salsabila+Aulia&background=059669&color=fff"
                        alt="User"
                        class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="font-bold">Salsabila Aulia</div>
                        <div class="text-sm text-green-200">Pembeli Aktif</div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl hover:bg-white/20 transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                </div>

                <p class="text-green-50 text-lg mb-6 leading-relaxed">
                    "Produk original, kondisi bagus, dan pengemasan aman. Pasti belanja lagi di sini."
                </p>

                <div class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name=Bryan+Kristanto&background=059669&color=fff"
                        alt="User"
                        class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="font-bold">Bryan Kristanto</div>
                        <div class="text-sm text-green-200">Pembeli Aktif</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="bg-gradient-to-br from-green-600 via-green-700 to-emerald-800 rounded-3xl p-12 md:p-16 text-center text-white shadow-2xl relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full translate-x-1/2 translate-y-1/2"></div>

        <div class="relative z-10">
            <i class="fas fa-rocket text-6xl text-yellow-300 mb-6"></i>
            <h2 class="text-4xl md:text-5xl font-black mb-6">Siap Memulai Belanja?</h2>
            <p class="text-xl md:text-2xl mb-10 text-green-100 max-w-2xl mx-auto leading-relaxed">Bergabunglah dengan ribuan pelanggan puas lainnya dan mulai hemat sekarang!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register" class="inline-flex items-center justify-center bg-white text-green-600 hover:bg-green-50 px-10 py-5 rounded-xl text-lg font-black transition transform hover:scale-105 shadow-2xl">
                    <i class="fas fa-user-plus mr-3"></i> Daftar Gratis Sekarang
                </a>
                <a href="/shop" class="inline-flex items-center justify-center bg-transparent border-3 border-white hover:bg-white hover:text-green-600 px-10 py-5 rounded-xl text-lg font-black transition transform hover:scale-105">
                    <i class="fas fa-shopping-bag mr-3"></i> Mulai Belanja
                </a>
            </div>
        </div>
    </div>
</div>
@endsection