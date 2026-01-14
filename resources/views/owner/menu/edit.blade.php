<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">
        <main class="flex-1 overflow-y-auto p-8 md:p-12">
            <div class="max-w-3xl mx-auto">
                <div class="mb-10">
                    <a href="{{ route('owner.menu.index') }}"
                        class="text-green-600 font-bold text-sm flex items-center gap-2 mb-4 hover:underline">
                        ← Kembali ke Daftar Menu
                    </a>
                    <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Edit Menu: {{ $menu->nama_menu }}</h2>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 md:p-10 shadow-sm">
                    <form action="{{ route('owner.menu.update', $menu) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-widest">
                                Nama Produk
                            </label>
                            <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold"
                                placeholder="Contoh: Bakso Urat Spesial" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-widest">
                                    Harga (Rp)
                                </label>
                                <input type="number" name="harga" value="{{ old('harga', $menu->harga) }}"
                                    class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold"
                                    placeholder="Contoh: 15000" required>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-widest">
                                    Kategori
                                </label>
                                <select name="category_id"
                                    class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-500"
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-widest">
                                Deskripsi Menu
                            </label>
                            <textarea name="deskripsi" rows="3"
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold"
                                placeholder="Jelaskan detail menu Anda...">{{ old('deskripsi', $menu->deskripsi_menu) }}</textarea>
                        </div>

                        <div class="mb-10">
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-widest">
                                Foto Menu (Kosongkan jika tidak ingin ganti)
                            </label>

                            <div class="mb-4">
                                <input type="file" name="gambar_menu" onchange="previewImage(event)"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                            </div>

                            <div class="relative w-full h-56 bg-gray-50 border-2 border-dashed border-gray-200 rounded-[2rem] flex flex-col items-center justify-center overflow-hidden hover:border-green-400 transition-colors">
                                <div id="preview-text" class="{{ $menu->gambar_menu ? 'hidden' : '' }} text-center">
                                    <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-xs font-bold text-gray-400">Pilih foto baru untuk mengganti</p>
                                </div>
                                <img id="image-preview" src="{{ $menu->gambar_menu ? url($menu->gambar_menu) : '#' }}"
                                    class="absolute inset-0 w-full h-full object-cover {{ $menu->gambar_menu ? '' : 'hidden' }}">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-green-600 text-white py-5 rounded-[2rem] font-black text-lg shadow-xl shadow-green-100 hover:bg-green-700 transition-all uppercase tracking-widest">
                            Simpan Perubahan
                        </button>
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
