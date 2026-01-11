<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ReUse Market - Barang Bekas Berkualitas')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .gradient-text {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #059669;
            transition: width 0.3s ease;
        }

        .nav-link:hover::before {
            width: 100%;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-green-50">
    @php
        $cartCount = collect(session()->get('cart', []))->sum('quantity');
        $wishlistCount = count(session()->get('wishlist', []));
    @endphp
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-green-700 to-green-600 text-white py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-4">
                    <span><i class="fas fa-phone-alt mr-1"></i> +62 858-9542-9073</span>
                    <span class="hidden md:inline"><i class="fas fa-envelope mr-1"></i> reusemarket@gmail.com</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-green-200 transition"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-green-200 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-green-200 transition"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-xl sticky top-0 z-50 border-b-4 border-green-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-green-400 rounded-full blur-md opacity-50 group-hover:opacity-75 transition"></div>
                            <i class="fas fa-recycle text-4xl text-green-600 relative transform group-hover:rotate-180 transition-transform duration-500"></i>
                        </div>
                        <div>
                            <span class="text-3xl font-black text-gray-800">ReUse</span>
                            <span class="text-3xl font-black gradient-text">Market</span>
                            <p class="text-xs text-gray-500 -mt-1">Barang Bekas Berkualitas</p>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-1">
                    <a href="/" class="nav-link text-gray-700 hover:text-green-600 px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->is('/') ? 'bg-green-50 text-green-600' : '' }}">
                        <i class="fas fa-home mr-2"></i> Beranda
                    </a>
                    <a href="/shop" class="nav-link text-gray-700 hover:text-green-600 px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->is('shop*') ? 'bg-green-50 text-green-600' : '' }}">
                        <i class="fas fa-shopping-bag mr-2"></i> Belanja
                    </a>
                    <a href="/orders" class="nav-link text-gray-700 hover:text-green-600 px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->is('orders*') ? 'bg-green-50 text-green-600' : '' }}">
                        <i class="fas fa-box mr-2"></i> Pesanan
                    </a>
                    <a href="/about" class="nav-link text-gray-700 hover:text-green-600 px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->is('about') ? 'bg-green-50 text-green-600' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> Tentang
                    </a>
                    <a href="/contact" class="nav-link text-gray-700 hover:text-green-600 px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->is('contact') ? 'bg-green-50 text-green-600' : '' }}">
                        <i class="fas fa-envelope mr-2"></i> Kontak
                    </a>
                </div>

                <!-- User Actions -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                    <a href="/wishlist" class="relative text-gray-700 hover:text-green-600 p-2 hover:bg-green-50 rounded-lg transition group">
                        <i class="fas fa-heart text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold animate-pulse">{{ $wishlistCount }}</span>
                    </a>
                    <a href="/cart" class="relative text-gray-700 hover:text-green-600 p-2 hover:bg-green-50 rounded-lg transition group">
                        <i class="fas fa-shopping-cart text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="absolute -top-1 -right-1 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold animate-pulse">{{ $cartCount }}</span>
                    </a>
                    <div class="relative">
                        <button id="profileBtn" onclick="toggleProfileDropdown()" class="flex items-center space-x-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-lg hover:from-green-700 hover:to-green-800 transition shadow-lg hover:shadow-xl">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="profileDropdown" class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 hidden animate-slide-down border border-gray-100">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="/profile" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">
                                <i class="fas fa-user w-5"></i>
                                <span class="ml-3">Profil Saya</span>
                            </a>
                            <a href="/orders" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">
                                <i class="fas fa-box w-5"></i>
                                <span class="ml-3">Pesanan Saya</span>
                            </a>
                            <form method="POST" action="/logout" class="border-t border-gray-100">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition">
                                    <i class="fas fa-sign-out-alt w-5"></i>
                                    <span class="ml-3">Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="/login" class="text-gray-700 hover:text-green-600 px-4 py-2 rounded-lg text-sm font-semibold transition hover:bg-green-50">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </a>
                    <a href="/register" class="bg-gradient-to-r from-green-600 to-green-700 text-white hover:from-green-700 hover:to-green-800 px-6 py-2.5 rounded-lg text-sm font-bold transition shadow-lg hover:shadow-xl transform hover:scale-105">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-green-600 p-2">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 bg-white">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="/" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                    <i class="fas fa-home w-6"></i>
                    <span class="ml-3">Beranda</span>
                </a>
                <a href="/shop" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                    <i class="fas fa-shopping-bag w-6"></i>
                    <span class="ml-3">Belanja</span>
                </a>
                <a href="/orders" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                    <i class="fas fa-box w-6"></i>
                    <span class="ml-3">Pesanan</span>
                </a>
                <a href="/about" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                    <i class="fas fa-info-circle w-6"></i>
                    <span class="ml-3">Tentang Kami</span>
                </a>
                <a href="/contact" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                    <i class="fas fa-envelope w-6"></i>
                    <span class="ml-3">Hubungi Kami</span>
                </a>
                @auth
                <div class="border-t border-gray-200 pt-2 mt-2">
                    <a href="/cart" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                        <i class="fas fa-shopping-cart w-6"></i>
                        <span class="ml-3">Keranjang</span>
                        <span class="ml-auto bg-green-500 text-white text-xs px-2 py-1 rounded-full">{{ $cartCount }}</span>
                    </a>
                    <a href="/wishlist" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                        <i class="fas fa-heart w-6"></i>
                        <span class="ml-3">Wishlist</span>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $wishlistCount }}</span>
                    </a>
                    <a href="/profile" class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-600 px-3 py-3 rounded-lg text-base font-medium transition">
                        <i class="fas fa-user w-6"></i>
                        <span class="ml-3">Profil</span>
                    </a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-red-600 hover:bg-red-50 px-3 py-3 rounded-lg text-base font-medium transition">
                            <i class="fas fa-sign-out-alt w-6"></i>
                            <span class="ml-3">Keluar</span>
                        </button>
                    </form>
                </div>
                @else
                <div class="border-t border-gray-200 pt-2 mt-2 space-y-2">
                    <a href="/login" class="flex items-center justify-center text-green-600 border-2 border-green-600 hover:bg-green-50 px-4 py-3 rounded-lg text-base font-bold transition">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </a>
                    <a href="/register" class="flex items-center justify-center bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-3 rounded-lg text-base font-bold transition">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg animate-slide-down flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-2xl mr-3"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-green-700 hover:text-green-900">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg animate-slide-down flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-2xl mr-3"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-red-700 hover:text-red-900">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- About -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-green-400 rounded-full blur-lg opacity-50"></div>
                            <i class="fas fa-recycle text-4xl text-green-400 relative"></i>
                        </div>
                        <div>
                            <span class="text-2xl font-black">ReUse</span>
                            <span class="text-2xl font-black text-green-400">Market</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">Platform jual beli barang bekas berkualitas. Memberikan kehidupan kedua untuk barang-barang yang masih layak pakai.</p>
                    <div class="flex space-x-3 pt-4">
                        <a href="#" class="bg-gray-800 hover:bg-green-600 w-10 h-10 rounded-full flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-green-600 w-10 h-10 rounded-full flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-green-600 w-10 h-10 rounded-full flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-green-600 w-10 h-10 rounded-full flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-green-400">Menu Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-400 hover:text-green-400 transition flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i> Beranda
                            </a></li>
                        <li><a href="/shop" class="text-gray-400 hover:text-green-400 transition flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i> Belanja
                            </a></li>
                        <li><a href="/about" class="text-gray-400 hover:text-green-400 transition flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i> Tentang Kami
                            </a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-green-400 transition flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i> Hubungi Kami
                            </a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-green-400">Kontak Kami</h3>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-green-400 mt-1 mr-3"></i>
                            <span>Jl. Raya Darmo No. 123<br>Surabaya, Jawa Timur 60111</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-green-400 mr-3"></i>
                            <span>+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-green-400 mr-3"></i>
                            <span>info@reusemarket.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-green-400 mr-3"></i>
                            <span>Senin - Sabtu: 08:00 - 17:00</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-green-400">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">Dapatkan update produk terbaru dan penawaran spesial!</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-green-500 text-sm transition">
                        <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 px-4 py-3 rounded-lg text-sm font-bold transition shadow-lg transform hover:scale-105">
                            <i class="fas fa-paper-plane mr-2"></i> Berlangganan
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">&copy; 2025 ReUse Market. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-green-400 text-sm transition">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-400 hover:text-green-400 text-sm transition">Syarat & Ketentuan</a>
                        <a href="#" class="text-gray-400 hover:text-green-400 text-sm transition">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scroll-top" class="fixed bottom-8 right-8 bg-gradient-to-r from-green-600 to-green-700 text-white w-12 h-12 rounded-full shadow-2xl hover:from-green-700 hover:to-green-800 transition transform hover:scale-110 hidden z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Scroll to top button
        const scrollTopBtn = document.getElementById('scroll-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.remove('hidden');
            } else {
                scrollTopBtn.classList.add('hidden');
            }
        });
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Auto hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('[class*="border-l-4"]');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        // Profile dropdown toggle
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close profile dropdown on outside click
        document.addEventListener('click', function(event) {
            const profileBtn = document.getElementById('profileBtn');
            const dropdown = document.getElementById('profileDropdown');
            
            if (profileBtn && dropdown && !profileBtn.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

    <!-- Modal Component -->
    @include('components.modal')
</body>

</html>