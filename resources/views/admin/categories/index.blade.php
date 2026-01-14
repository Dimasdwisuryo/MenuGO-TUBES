<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Admin Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Manajemen User
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                       class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Manajemen Kategori
                    </a>
                    <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Verifikasi UMKM
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="p-8 md:p-12">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-bold flex items-center gap-3 shadow-sm">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-gray-100 p-8 md:p-10">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
                        <div>
                            <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Manajemen Kategori</h2>
                            <p class="text-gray-400 text-sm font-medium mt-1">Kelola kategori menu seperti makanan dan minuman</p>
                        </div>

                        <form action="{{ route('admin.categories.store') }}" method="POST" class="flex gap-2 w-full md:w-auto">
                            @csrf
                            <input type="text" name="nama_kategori" placeholder="Input kategori baru..." class="flex-1 md:w-64 rounded-xl border-gray-100 focus:ring-green-500 focus:border-green-500 font-bold" required>
                            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 transition shadow-lg shadow-green-100">
                                Simpan
                            </button>
                        </form>
                    </div>

                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100">
                                    <th class="px-6 py-5 text-[10px] font-black uppercase text-gray-400 tracking-widest">ID</th>
                                    <th class="px-6 py-5 text-[10px] font-black uppercase text-gray-400 tracking-widest">Nama Kategori</th>
                                    <th class="px-6 py-5 text-[10px] font-black uppercase text-gray-400 tracking-widest text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse ($categories as $category)
                                <tr class="hover:bg-gray-50/80 transition-all duration-200">
                                    <td class="px-6 py-5 font-bold text-gray-300">#{{ $category->id }}</td>
                                    <td class="px-6 py-5 font-black text-gray-700 uppercase tracking-tight">{{ $category->nama_kategori }}</td>
                                    <td class="px-6 py-5">
                                        <div class="flex justify-center gap-2">
                                            <button onclick="openEditModal({{ $category->id }}, '{{ $category->nama_kategori }}')"
                                                    class="group flex items-center justify-center w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm"
                                                    title="Edit Kategori">
                                                    <svg class="w-5 h-5 transition-transform group-hover:rotate-12"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                            </button>

                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus kategori {{ $category->nama_kategori }}?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="group flex items-center justify-center w-10 h-10 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition-all duration-300 shadow-sm"
                                                        title="Hapus User">
                                                        <svg class="w-5 h-5 transition-transform group-hover:rotate-12"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-gray-400 font-bold uppercase tracking-widest text-xs">Belum ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="editModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] w-full max-w-md p-10 shadow-2xl overflow-hidden relative">
            <h3 class="text-2xl font-black text-gray-800 mb-6 uppercase tracking-tight">Edit Kategori</h3>
            <form id="editForm" method="POST">
                @csrf @method('PUT')
                <div class="mb-6">
                    <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-widest">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="edit_nama_kategori" class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700" required>
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-green-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-green-100 hover:bg-green-700 transition">Update Data</button>
                    <button type="button" onclick="closeEditModal()" class="px-6 py-4 text-gray-400 font-bold hover:text-gray-600 transition">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');
            const input = document.getElementById('edit_nama_kategori');

            form.action = `/admin/categories/${id}`; // Sesuaikan rute dengan route:list anda
            input.value = name;
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
