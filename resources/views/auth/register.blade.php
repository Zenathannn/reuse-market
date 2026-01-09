@extends('layouts.app')

@section('title', 'Daftar - ReUse Market')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-400 rounded-full filter blur-3xl translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-green-400 rounded-full filter blur-3xl -translate-x-1/2 translate-y-1/2"></div>
    </div>

    <div class="max-w-md w-full relative z-10">
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-10 border border-white">
            <!-- Logo & Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center items-center space-x-2 mb-6">
                    <div class="relative">
                        <div class="absolute inset-0 bg-green-400 rounded-full blur-md opacity-50"></div>
                        <i class="fas fa-recycle text-6xl text-green-600 relative"></i>
                    </div>
                </div>
                <h2 class="text-4xl font-black text-gray-800">Buat Akun Baru</h2>
                <p class="text-gray-600 mt-3 text-lg">Bergabunglah dengan ReUse Market sekarang!</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
            <div class="bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 text-red-700 px-4 py-4 rounded-xl mb-6">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-xl mr-3 mt-0.5"></i>
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            required
                            value="{{ old('name') }}"
                            maxlength="20"
                            class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition text-gray-800 font-medium"
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            value="{{ old('email') }}"
                            maxlength="50"
                            class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition text-gray-800 font-medium"
                            placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition text-gray-800 font-medium"
                            placeholder="••••••••">
                    </div>
                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                        <i class="fas fa-info-circle mr-1"></i> Minimal 8 karakter
                    </p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition text-gray-800 font-medium"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Terms -->
                <div class="bg-green-50 border-2 border-green-200 rounded-xl p-4">
                    <label class="flex items-start cursor-pointer group">
                        <input
                            id="terms"
                            name="terms"
                            type="checkbox"
                            required
                            class="w-5 h-5 text-green-600 focus:ring-green-500 border-gray-300 rounded mt-0.5">
                        <span class="ml-3 text-sm text-gray-700 leading-relaxed">
                            Saya setuju dengan
                            <a href="#" class="text-green-600 hover:text-green-700 font-bold transition">Syarat & Ketentuan</a>
                            dan
                            <a href="#" class="text-green-600 hover:text-green-700 font-bold transition">Kebijakan Privasi</a> ReUse Market
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="group w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-black py-4 px-6 rounded-xl transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-xl hover:shadow-2xl">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-user-plus mr-3"></i>
                        Daftar Sekarang
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8 mb-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t-2 border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500 font-semibold">Atau daftar dengan</span>
                    </div>
                </div>
            </div>

            <!-- Social Register -->
            <div class="grid grid-cols-2 gap-4 mb-8">
                <button class="flex items-center justify-center px-4 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition group">
                    <i class="fab fa-google text-xl text-gray-600 group-hover:text-blue-600 mr-2"></i>
                    <span class="font-bold text-gray-700 group-hover:text-blue-600">Google</span>
                </button>
                <button class="flex items-center justify-center px-4 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-blue-700 hover:bg-blue-50 transition group">
                    <i class="fab fa-facebook text-xl text-gray-600 group-hover:text-blue-700 mr-2"></i>
                    <span class="font-bold text-gray-700 group-hover:text-blue-700">Facebook</span>
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-gray-700 font-medium">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-black transition">
                        Masuk di sini <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-8">
            <a href="/" class="inline-flex items-center text-gray-700 hover:text-green-600 font-semibold transition group">
                <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection