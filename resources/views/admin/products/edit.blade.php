@extends('layouts.app')

@section('title', 'Edit Produk - Admin ReUse Market')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm mb-4">
            <a href="/" class="hover:text-purple-200 transition"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('admin.products.index') }}" class="hover:text-purple-200 transition">Admin</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-semibold">Edit Produk</span>
        </nav>
        <h1 class="text-4xl font-black">Edit Produk</h1>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-box text-purple-600 mr-1"></i> Nama Produk *
                </label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                    placeholder="Contoh: Laptop Bekas Dell Core i5">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Harga -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-tag text-purple-600 mr-1"></i> Harga (Rp) *
                </label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" required min="0"
                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('price') border-red-500 @enderror"
                    placeholder="3500000">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-file-alt text-purple-600 mr-1"></i> Deskripsi *
                </label>
                <textarea name="details" required rows="4" maxlength="1000"
                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('details') border-red-500 @enderror"
                    placeholder="Jelaskan kondisi, fitur, dan detail produk...">{{ old('details', $product->details) }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Maksimal 1000 karakter</p>
                @error('details')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kondisi -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-3">
                    <i class="fas fa-check-circle text-purple-600 mr-1"></i> Kondisi Produk *
                </label>
                <div class="space-y-2">
                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-purple-500 transition @error('condition') border-red-500 @enderror">
                        <input type="radio" name="condition" value="like_new" {{ old('condition', $product->condition) == 'like_new' ? 'checked' : '' }} required class="w-4 h-4 text-purple-600">
                        <span class="ml-3 font-semibold text-gray-800">Seperti Baru</span>
                    </label>
                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-purple-500 transition">
                        <input type="radio" name="condition" value="good" {{ old('condition', $product->condition) == 'good' ? 'checked' : '' }} class="w-4 h-4 text-purple-600">
                        <span class="ml-3 font-semibold text-gray-800">Bagus</span>
                    </label>
                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-purple-500 transition">
                        <input type="radio" name="condition" value="fair" {{ old('condition', $product->condition) == 'fair' ? 'checked' : '' }} class="w-4 h-4 text-purple-600">
                        <span class="ml-3 font-semibold text-gray-800">Cukup Baik</span>
                    </label>
                </div>
                @error('condition')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div class="border-2 border-dashed border-purple-300 rounded-2xl p-8">
                <h3 class="text-lg font-bold text-gray-800 mb-6">
                    <i class="fas fa-image text-purple-600 mr-2"></i> Gambar Produk
                </h3>

                <!-- Gambar 1 -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-camera text-purple-600 mr-1"></i> Gambar Utama
                    </label>
                    @if($product->image_01)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image_01) }}" alt="Gambar saat ini" class="w-full h-40 object-cover rounded-xl">
                        <p class="text-xs text-gray-500 mt-2">Upload gambar baru untuk mengganti</p>
                    </div>
                    @endif
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-purple-300 rounded-xl cursor-pointer hover:bg-purple-50 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-3xl text-purple-400 mb-2"></i>
                                <p class="text-sm text-gray-600"><span class="font-bold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF (Max. 2MB)</p>
                            </div>
                            <input type="file" name="image_01" accept="image/*" class="hidden" onchange="updateImagePreview(this, 'preview_01')">
                        </label>
                    </div>
                    <div id="preview_01" class="mt-3"></div>
                    @error('image_01')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar 2 -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-camera text-gray-400 mr-1"></i> Gambar Tambahan 1
                    </label>
                    @if($product->image_02)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image_02) }}" alt="Gambar saat ini" class="w-full h-40 object-cover rounded-xl">
                        <p class="text-xs text-gray-500 mt-2">Upload gambar baru untuk mengganti</p>
                    </div>
                    @endif
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600"><span class="font-bold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF (Max. 2MB)</p>
                            </div>
                            <input type="file" name="image_02" accept="image/*" class="hidden" onchange="updateImagePreview(this, 'preview_02')">
                        </label>
                    </div>
                    <div id="preview_02" class="mt-3"></div>
                    @error('image_02')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar 3 -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-camera text-gray-400 mr-1"></i> Gambar Tambahan 2
                    </label>
                    @if($product->image_03)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image_03) }}" alt="Gambar saat ini" class="w-full h-40 object-cover rounded-xl">
                        <p class="text-xs text-gray-500 mt-2">Upload gambar baru untuk mengganti</p>
                    </div>
                    @endif
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600"><span class="font-bold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF (Max. 2MB)</p>
                            </div>
                            <input type="file" name="image_03" accept="image/*" class="hidden" onchange="updateImagePreview(this, 'preview_03')">
                        </label>
                    </div>
                    <div id="preview_03" class="mt-3"></div>
                    @error('image_03')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-6">
                <button type="submit" class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-700 hover:from-purple-700 hover:to-indigo-800 text-white font-bold py-4 rounded-xl transition transform hover:scale-105 shadow-lg">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.products.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-4 rounded-xl text-center transition">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function updateImagePreview(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-40 object-cover rounded-xl';
            preview.appendChild(img);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
