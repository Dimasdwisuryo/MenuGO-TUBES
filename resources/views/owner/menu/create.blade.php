<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden font-sans">
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6 flex-1">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-6 px-4">Owner Panel</p>

                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('owner.umkm.profile') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Profil Toko
                    </a>

                    <a href="{{ route('owner.menu.index') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Manajemen Menu
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-6 md:p-10">
            <div class="max-w-5xl mx-auto">
                <div class="mb-6">
                    <a href="{{ route('owner.menu.index') }}"
                        class="text-green-600 font-bold text-xs flex items-center gap-2 mb-2 hover:underline">
                        ← Kembali ke Koleksi
                    </a>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">TAMBAH MENU BARU</h2>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <form action="{{ route('owner.menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 tracking-widest">Nama Produk</label>
                                    <input type="text" name="nama_menu"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:bg-white transition-all font-bold"
                                        placeholder="Contoh: Bakso Urat Granat" required>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 tracking-widest">Harga (Rp)</label>
                                        <input type="number" name="harga"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:bg-white transition-all font-bold"
                                            placeholder="15000" required>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 tracking-widest">Kategori</label>
                                        <select name="category_id"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:bg-white transition-all font-bold text-gray-600"
                                            required>
                                            <option value="">Pilih...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 tracking-widest">Deskripsi</label>
                                    <textarea name="deskripsi" rows="4"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:bg-white transition-all font-medium"
                                        placeholder="Jelaskan detail menu Anda..."></textarea>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 tracking-widest">Visual Produk</label>

                                <div class="relative w-full h-48 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl flex flex-col items-center justify-center overflow-hidden group">
                                    <div id="preview-text" class="text-center p-4">
                                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-[10px] font-bold text-gray-400">PREVIEW GAMBAR</p>
                                    </div>
                                    <img id="image-preview" class="absolute inset-0 w-full h-full object-cover hidden">
                                </div>

                                <input type="file" name="gambar_menu" onchange="previewImage(event)"
                                    class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-[10px] file:font-black file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer"
                                    required>
                            </div>
                        </div>

                        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end">
                            <button type="submit"
                                class="px-10 py-3 bg-green-600 text-white rounded-lg font-black text-sm shadow-md hover:bg-green-700 transition-all uppercase tracking-widest">
                                Simpan Menu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                var text = document.getElementById('preview-text');
                output.src = reader.result;
                output.classList.remove('hidden');
                text.classList.add('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
