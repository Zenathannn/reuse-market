@extends('layouts.app')

@section('title', 'Tentang Kami - ReUse Market')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-green-600 via-green-700 to-emerald-800 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-green-200 font-bold text-lg">Tentang Kami</span>
        <h1 class="text-5xl md:text-6xl font-black mt-4 mb-6">Cerita ReUse Market</h1>
        <p class="text-xl md:text-2xl text-green-100 max-w-3xl mx-auto leading-relaxed">Misi kami adalah memberikan kehidupan kedua untuk barang-barang berkualitas sambil menjaga kelestarian lingkungan</p>
    </div>
</div>

<!-- Story Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="text-green-600 font-bold text-lg">Kisah Kami</span>
            <h2 class="text-4xl font-black text-gray-800">Dimulai dari Mimpi Sederhana</h2>
            <p class="text-gray-600 text-lg leading-relaxed">ReUse Market lahir dari keinginan untuk mengurangi sampah dan memberikan akses kepada masyarakat untuk mendapatkan barang berkualitas dengan harga terjangkau.</p>
            <p class="text-gray-600 text-lg leading-relaxed">Sejak 2020, kami telah membantu ribuan pelanggan menemukan barang bekas yang masih layak pakai, dari elektronik hingga furniture, dengan standar kualitas tinggi.</p>
            <div class="flex items-center space-x-6 pt-4">
                <div>
                    <div class="text-4xl font-black text-green-600">500+</div>
                    <div class="text-sm text-gray-600">Produk Terjual</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-green-600">1K+</div>
                    <div class="text-sm text-gray-600">Pelanggan Puas</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-green-600">4.8</div>
                    <div class="text-sm text-gray-600">Rating</div>
                </div>
            </div>
        </div>
        <div class="relative">
            <img src="https://via.placeholder.com/600x400/059669/FFFFFF?text=Our+Story" alt="Story" class="rounded-3xl shadow-2xl">
            <div class="absolute -bottom-6 -left-6 bg-gradient-to-br from-green-600 to-emerald-700 text-white p-6 rounded-2xl shadow-2xl">
                <div class="text-3xl font-black">5 Tahun+</div>
                <div class="text-sm">Pengalaman</div>
            </div>
        </div>
    </div>
</div>

<!-- Mission & Vision -->
<div class="bg-gradient-to-br from-gray-50 to-green-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Mission -->
            <div class="bg-white p-10 rounded-3xl shadow-xl hover-lift">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-3xl text-white"></i>
                </div>
                <h3 class="text-3xl font-black text-gray-800 mb-4">Misi Kami</h3>
                <p class="text-gray-600 text-lg leading-relaxed mb-4">Menyediakan platform terpercaya untuk jual beli barang bekas berkualitas dengan harga terjangkau, sambil mendorong gaya hidup berkelanjutan dan mengurangi sampah.</p>
                <ul class="space-y-3">
                    <li class="flex items-start text-gray-600">
                        <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                        <span>Memberikan akses barang berkualitas untuk semua</span>
                    </li>
                    <li class="flex items-start text-gray-600">
                        <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                        <span>Mengurangi dampak lingkungan melalui reuse</span>
                    </li>
                    <li class="flex items-start text-gray-600">
                        <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                        <span>Membangun komunitas peduli lingkungan</span>
                    </li>
                </ul>
            </div>

            <!-- Vision -->
            <div class="bg-gradient-to-br from-green-600 to-emerald-700 text-white p-10 rounded-3xl shadow-xl hover-lift">
                <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-3xl text-white"></i>
                </div>
                <h3 class="text-3xl font-black mb-4">Visi Kami</h3>
                <p class="text-green-100 text-lg leading-relaxed mb-4">Menjadi platform terdepan di Indonesia untuk ekonomi sirkular, di mana setiap barang mendapat kesempatan kedua dan berkontribusi untuk planet yang lebih hijau.</p>
                <ul class="space-y-3">
                    <li class="flex items-start text-green-100">
                        <i class="fas fa-star text-yellow-300 mr-3 mt-1"></i>
                        <span>Platform #1 untuk barang bekas di Indonesia</span>
                    </li>
                    <li class="flex items-start text-green-100">
                        <i class="fas fa-star text-yellow-300 mr-3 mt-1"></i>
                        <span>Menginspirasi jutaan orang untuk reuse</span>
                    </li>
                    <li class="flex items-start text-green-100">
                        <i class="fas fa-star text-yellow-300 mr-3 mt-1"></i>
                        <span>Mengurangi 1 juta ton sampah per tahun</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Values -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16">
        <span class="text-green-600 font-bold text-lg">Nilai-Nilai Kami</span>
        <h2 class="text-4xl md:text-5xl font-black text-gray-800 mt-2 mb-4">Yang Kami Pegang Teguh</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift text-center">
            <div class="bg-gradient-to-br from-green-500 to-emerald-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-heart text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Integritas</h3>
            <p class="text-gray-600">Kami berkomitmen untuk jujur dan transparan dalam setiap transaksi</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift text-center">
            <div class="bg-gradient-to-br from-blue-500 to-cyan-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-leaf text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Keberlanjutan</h3>
            <p class="text-gray-600">Peduli lingkungan adalah prioritas utama dalam setiap keputusan kami</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift text-center">
            <div class="bg-gradient-to-br from-purple-500 to-pink-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-users text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Komunitas</h3>
            <p class="text-gray-600">Membangun komunitas yang saling mendukung dan peduli</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift text-center">
            <div class="bg-gradient-to-br from-yellow-500 to-amber-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-shield-alt text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Kepercayaan</h3>
            <p class="text-gray-600">Menjaga kepercayaan pelanggan dengan kualitas dan layanan terbaik</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift text-center">
            <div class="bg-gradient-to-br from-red-500 to-rose-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-rocket text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Inovasi</h3>
            <p class="text-gray-600">Terus berinovasi untuk memberikan pengalaman belanja terbaik</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift text-center">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-smile text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Kepuasan</h3>
            <p class="text-gray-600">Kepuasan pelanggan adalah kebahagiaan kami</p>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="bg-gradient-to-br from-green-600 via-green-700 to-emerald-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-green-200 font-bold text-lg">Tim Kami</span>
            <h2 class="text-4xl md:text-5xl font-black mt-2 mb-4">Orang-Orang di Balik ReUse Market</h2>
            <p class="text-xl text-green-100 max-w-2xl mx-auto">Tim profesional yang berdedikasi untuk memberikan layanan terbaik</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl hover:bg-white/20 transition text-center">
                <img src="https://ui-avatars.com/api/?name=Team+Member+{{ $i }}&size=200&background=059669&color=fff" alt="Team" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-white/30">
                <h3 class="text-xl font-bold mb-1">Team Member {{ $i }}</h3>
                <p class="text-green-200 text-sm mb-3">Position Title</p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="bg-white/20 hover:bg-white/30 w-8 h-8 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-linkedin text-sm"></i>
                    </a>
                    <a href="#" class="bg-white/20 hover:bg-white/30 w-8 h-8 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-twitter text-sm"></i>
                    </a>
                </div>
        </div>
        @endfor
    </div>
</div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="bg-gradient-to-br from-green-600 via-green-700 to-emerald-800 rounded-3xl p-12 md:p-16 text-center text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full translate-x-1/2 translate-y-1/2"></div>

        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-black mb-6">Tertarik Bergabung?</h2>
            <p class="text-xl md:text-2xl mb-10 text-green-100 max-w-2xl mx-auto">Mari bersama-sama membuat perbedaan untuk lingkungan!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register" class="inline-flex items-center justify-center bg-white text-green-600 hover:bg-green-50 px-10 py-5 rounded-xl text-lg font-black transition transform hover:scale-105 shadow-2xl">
                    <i class="fas fa-user-plus mr-3"></i> Daftar Sekarang
                </a>
                <a href="/contact" class="inline-flex items-center justify-center bg-transparent border-3 border-white hover:bg-white hover:text-green-600 px-10 py-5 rounded-xl text-lg font-black transition transform hover:scale-105">
                    <i class="fas fa-envelope mr-3"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>
@endsection