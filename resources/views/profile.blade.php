@extends('layouts.app')

@section('title', 'Profil Saya - ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-purple-600 to-pink-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-purple-200 transition">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Profil</span>
        </nav>
        <h1 class="text-4xl font-black">Profil Saya</h1>
        <p class="text-purple-100 mt-2">Kelola informasi akun Anda</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-4 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden sticky top-24">
                <!-- Profile Header -->
                <div class="bg-gradient-to-br from-purple-600 to-pink-700 p-6 text-center text-white">
                    <div class="relative inline-block mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&size=120&background=7c3aed&color=fff&bold=true" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                        <button class="absolute bottom-0 right-0 bg-white text-purple-600 w-8 h-8 rounded-full shadow-lg hover:bg-purple-50 transition">
                            <i class="fas fa-camera text-sm"></i>
                        </button>
                    </div>
                    <h3 class="text-xl font-bold">{{ Auth::user()->name }}</h3>
                    <p class="text-purple-200 text-sm">{{ Auth::user()->email }}</p>
                    <div class="mt-4 flex justify-center space-x-2">
                        <span class="bg-white/20 px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-star mr-1"></i> Member Silver
                        </span>
                    </div>
                </div>

                <!-- Menu -->
                <nav class="p-4">
                    <a href="#" class="flex items-center px-4 py-3 bg-purple-50 text-purple-600 rounded-xl font-semibold mb-2">
                        <i class="fas fa-user w-5 mr-3"></i> Profil Saya
                    </a>
                    <a href="/orders" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl font-semibold mb-2 transition">
                        <i class="fas fa-box w-5 mr-3"></i> Pesanan Saya
                    </a>
                    <a href="/wishlist" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl font-semibold mb-2 transition">
                        <i class="fas fa-heart w-5 mr-3"></i> Wishlist
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl font-semibold mb-2 transition">
                        <i class="fas fa-map-marker-alt w-5 mr-3"></i> Alamat
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl font-semibold mb-2 transition">
                        <i class="fas fa-bell w-5 mr-3"></i> Notifikasi
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl font-semibold mb-2 transition">
                        <i class="fas fa-cog w-5 mr-3"></i> Pengaturan
                    </a>
                    <form method="POST" action="/logout" class="mt-4">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-3 text-red-600 hover:bg-red-50 rounded-xl font-semibold transition">
                            <i class="fas fa-sign-out-alt w-5 mr-3"></i> Keluar
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Account Info -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-user-circle text-purple-600 mr-2"></i>
                        Informasi Akun
                    </h2>
                    <button class="text-purple-600 hover:text-purple-700 font-bold transition">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" value="{{ Auth::user()->name }}" disabled class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl text-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                        <input type="email" value="{{ Auth::user()->email }}" disabled class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl text-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Telepon</label>
                        <input type="tel" placeholder="+62 812-3456-7890" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl text-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl text-gray-700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Kelamin</label>
                        <div class="flex space-x-6">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="gender" value="male" class="w-4 h-4 text-purple-600">
                                <span class="ml-2 text-gray-700">Laki-laki</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="gender" value="female" class="w-4 h-4 text-purple-600">
                                <span class="ml-2 text-gray-700">Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>

                <button class="mt-6 bg-gradient-to-r from-purple-600 to-pink-700 hover:from-purple-700 hover:to-pink-800 text-white font-bold px-8 py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>

            <!-- Statistics -->
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl shadow-lg p-6 text-white hover-lift">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm mb-1">Total Pesanan</p>
                            <p class="text-4xl font-black">12</p>
                        </div>
                        <i class="fas fa-shopping-bag text-5xl opacity-20"></i>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white hover-lift">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm mb-1">Total Belanja</p>
                            <p class="text-4xl font-black">5.2M</p>
                        </div>
                        <i class="fas fa-dollar-sign text-5xl opacity-20"></i>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-lg p-6 text-white hover-lift">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm mb-1">Wishlist</p>
                            <p class="text-4xl font-black">8</p>
                        </div>
                        <i class="fas fa-heart text-5xl opacity-20"></i>
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-lock text-purple-600 mr-2"></i>
                    Ubah Password
                </h2>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password Saat Ini</label>
                        <input type="password" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password Baru</label>
                        <input type="password" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                        <input type="password" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="••••••••">
                    </div>
                </div>

                <button class="mt-6 bg-gradient-to-r from-purple-600 to-pink-700 hover:from-purple-700 hover:to-pink-800 text-white font-bold px-8 py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                    <i class="fas fa-key mr-2"></i> Update Password
                </button>
            </div>

            <!-- Preferences -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-sliders-h text-purple-600 mr-2"></i>
                    Preferensi
                </h2>

                <div class="space-y-4">
                    <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-purple-600 text-xl mr-4"></i>
                            <div>
                                <div class="font-bold text-gray-800">Email Notifikasi</div>
                                <div class="text-sm text-gray-600">Terima update via email</div>
                            </div>
                        </div>
                        <input type="checkbox" checked class="w-5 h-5 text-purple-600">
                    </label>

                    <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-bell text-purple-600 text-xl mr-4"></i>
                            <div>
                                <div class="font-bold text-gray-800">Push Notifikasi</div>
                                <div class="text-sm text-gray-600">Notifikasi di browser</div>
                            </div>
                        </div>
                        <input type="checkbox" checked class="w-5 h-5 text-purple-600">
                    </label>

                    <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-tag text-purple-600 text-xl mr-4"></i>
                            <div>
                                <div class="font-bold text-gray-800">Promo & Diskon</div>
                                <div class="text-sm text-gray-600">Info penawaran khusus</div>
                            </div>
                        </div>
                        <input type="checkbox" class="w-5 h-5 text-purple-600">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection