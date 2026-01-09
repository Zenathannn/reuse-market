@extends('layouts.app')

@section('title', 'Hubungi Kami - ReUse Market')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-green-600 via-green-700 to-emerald-800 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-green-200 font-bold text-lg">Hubungi Kami</span>
        <h1 class="text-5xl md:text-6xl font-black mt-4 mb-6">Kami Siap Membantu Anda</h1>
        <p class="text-xl md:text-2xl text-green-100 max-w-3xl mx-auto leading-relaxed">Ada pertanyaan? Tim kami siap menjawab dan membantu Anda 24/7</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <!-- Contact Cards -->
    <div class="grid md:grid-cols-3 gap-8 mb-20">
        <!-- Phone -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl hover-lift border-2 border-green-200 text-center">
            <div class="bg-gradient-to-br from-green-600 to-emerald-700 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                <i class="fas fa-phone text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Telepon</h3>
            <p class="text-gray-600 mb-4">Senin - Sabtu: 08:00 - 17:00</p>
            <a href="tel:+6281234567890" class="text-green-600 hover:text-green-700 font-bold text-lg transition">
                +62 812-3456-7890
            </a>
        </div>

        <!-- Email -->
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl hover-lift border-2 border-blue-200 text-center">
            <div class="bg-gradient-to-br from-blue-600 to-cyan-700 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                <i class="fas fa-envelope text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Email</h3>
            <p class="text-gray-600 mb-4">Respons dalam 24 jam</p>
            <a href="mailto:info@reusemarket.com" class="text-blue-600 hover:text-blue-700 font-bold text-lg transition">
                info@reusemarket.com
            </a>
        </div>

        <!-- Location -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl hover-lift border-2 border-purple-200 text-center">
            <div class="bg-gradient-to-br from-purple-600 to-pink-700 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                <i class="fas fa-map-marker-alt text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Lokasi</h3>
            <p class="text-gray-600 mb-4">Kunjungi kantor kami</p>
            <p class="text-purple-600 hover:text-purple-700 font-bold text-lg">
                Surabaya, Indonesia
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid lg:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="bg-white rounded-3xl shadow-2xl p-10 border-2 border-gray-100">
            <div class="mb-8">
                <h2 class="text-3xl font-black text-gray-800 mb-3">Kirim Pesan</h2>
                <p class="text-gray-600 text-lg">Isi form di bawah ini dan kami akan segera menghubungi Anda</p>
            </div>

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-user text-green-600 mr-2"></i> Nama Lengkap
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        required
                        maxlength="100"
                        class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-envelope text-green-600 mr-2"></i> Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        maxlength="100"
                        class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="nama@email.com">
                </div>

                <!-- Phone -->
                <div>
                    <label for="number" class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-phone text-green-600 mr-2"></i> Nomor Telepon
                    </label>
                    <input
                        id="number"
                        name="number"
                        type="tel"
                        required
                        maxlength="12"
                        class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="08123456789">
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-comment text-green-600 mr-2"></i> Pesan
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        required
                        maxlength="500"
                        class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none"
                        placeholder="Tulis pesan Anda di sini..."></textarea>
                    <p class="text-xs text-gray-500 mt-2">Maksimal 500 karakter</p>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="group w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-black py-4 px-6 rounded-xl transition transform hover:scale-105 shadow-xl hover:shadow-2xl">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-3 group-hover:translate-x-1 transition-transform"></i>
                        Kirim Pesan
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
            </form>
        </div>

        <!-- Info & Map -->
        <div class="space-y-8">
            <!-- Info Box -->
            <div class="bg-gradient-to-br from-green-600 to-emerald-800 text-white p-10 rounded-3xl shadow-2xl">
                <h3 class="text-2xl font-black mb-8">Informasi Kontak</h3>

                <div class="space-y-6">
                    <!-- Address -->
                    <div class="flex items-start">
                        <div class="bg-white/20 w-12 h-12 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Alamat Kantor</h4>
                            <p class="text-green-100">Jl. Raya Darmo No. 123<br>Surabaya, Jawa Timur 60111<br>Indonesia</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start">
                        <div class="bg-white/20 w-12 h-12 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Telepon</h4>
                            <p class="text-green-100">+62 812-3456-7890<br>+62 31-1234-5678</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="bg-white/20 w-12 h-12 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Email</h4>
                            <p class="text-green-100">info@reusemarket.com<br>support@reusemarket.com</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start">
                        <div class="bg-white/20 w-12 h-12 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Jam Operasional</h4>
                            <p class="text-green-100">Senin - Jumat: 08:00 - 17:00<br>Sabtu: 08:00 - 13:00<br>Minggu: Tutup</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-8 pt-8 border-t border-white/20">
                    <h4 class="font-bold text-lg mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-3">
                        <a href="#" class="bg-white/20 hover:bg-white hover:text-green-600 w-12 h-12 rounded-xl flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="bg-white/20 hover:bg-white hover:text-green-600 w-12 h-12 rounded-xl flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="bg-white/20 hover:bg-white hover:text-green-600 w-12 h-12 rounded-xl flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="bg-white/20 hover:bg-white hover:text-green-600 w-12 h-12 rounded-xl flex items-center justify-center transition transform hover:scale-110">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-2 border-gray-100">
                <div class="aspect-video bg-gray-200 flex items-center justify-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4967739416444!2d112.73169731477405!3d-7.300366794721895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb91c1b5f0df%3A0xe86a1d47e96d8b8b!2sSurabaya%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="bg-gradient-to-br from-gray-50 to-green-50 py-20 mt-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-green-600 font-bold text-lg">FAQ</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 mt-2 mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-gray-600 text-lg">Temukan jawaban untuk pertanyaan umum di bawah ini</p>
        </div>

        <div class="space-y-4">
            @for ($i = 1; $i <= 5; $i++)
                <details class="group bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                <summary class="flex items-center justify-between cursor-pointer p-6 font-bold text-lg text-gray-800 group-hover:text-green-600 transition">
                    <span class="flex items-center">
                        <i class="fas fa-question-circle text-green-600 mr-3"></i>
                        Pertanyaan {{ $i }}: Bagaimana cara berbelanja di ReUse Market?
                    </span>
                    <i class="fas fa-chevron-down group-open:rotate-180 transition-transform text-green-600"></i>
                </summary>
                <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                </div>
                </details>
                @endfor
        </div>
    </div>
</div>
@endsection