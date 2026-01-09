@extends('layouts.app')

@section('title', 'Login - ReUse Market')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-96 h-96 bg-green-400 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-400 rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>
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
                <h2 class="text-4xl font-black text-gray-800">Selamat Datang Kembali!</h2>
                <p class="text-gray-600 mt-3 text-lg">Masuk ke akun ReUse Market Anda</p>
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

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer group">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            class="w-5 h-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700 font-medium group-hover:text-green-600 transition">
                            Ingat saya
                        </span>
                    </label>
                    <a href="#" class="text-sm text-green-600 hover:text-green-700 font-bold transition">
                        Lupa password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="group w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-black py-4 px-6 rounded-xl transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-xl hover:shadow-2xl">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-3 group-hover:translate-x-1 transition-transform"></i>
                        Masuk Sekarang
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
                        <span class="px-4 bg-white text-gray-500 font-semibold">Atau lanjutkan dengan</span>
                    </div>
                </div>
            </div>

            <!-- Social Login -->
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

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-gray-700 font-medium">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-green-600 hover:text-green-700 font-black transition">
                        Daftar sekarang <i class="fas fa-arrow-right ml-1"></i>
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