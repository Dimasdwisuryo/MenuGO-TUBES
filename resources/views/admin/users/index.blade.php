<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Admin Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        Manajemen User
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Manajemen Kategori
                    </a>
                    <a href="{{ route('admin.verifikasi.index') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Verifikasi UMKM
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="p-8 md:p-12">

                @if (session('success'))
                    <div
                        class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-bold flex items-center gap-3 shadow-sm">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-gray-100 p-8 md:p-10">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
                        <div>
                            <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Manajemen User</h2>
                            <p class="text-gray-400 text-sm font-medium mt-1">Kelola seluruh pengguna yang terdaftar di platform MenuGO</p>
                        </div>

                        <a href="{{ route('admin.users.create') }}"
                            class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-2xl font-bold hover:bg-green-700 transition shadow-lg shadow-green-100 whitespace-nowrap">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah User Baru
                        </a>
                    </div>

                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left border-separate border-spacing-y-3">
                            <thead>
                                <tr class="text-gray-400">
                                    <th class="px-6 py-2 text-xs font-bold uppercase tracking-widest w-1/4">Nama</th>
                                    <th class="px-6 py-2 text-xs font-bold uppercase tracking-widest w-1/4">Email</th>
                                    <th class="px-6 py-2 text-xs font-bold uppercase tracking-widest w-1/6">Role</th>
                                    <th class="px-6 py-2 text-xs font-bold uppercase tracking-widest w-1/6">Status</th>
                                    <th class="px-6 py-2 text-xs font-bold uppercase tracking-widest text-center w-1/6">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white hover:bg-gray-50 transition-all duration-300 shadow-sm">
                                        <td class="px-6 py-4 rounded-l-[1.5rem] border-y border-l border-gray-50">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 font-black shadow-inner">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <p class="font-black text-gray-800 tracking-tight">{{ $user->name }}</p>
                                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">ID: #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-y border-gray-50">
                                            <span class="text-sm font-semibold text-gray-500">{{ $user->email }}</span>
                                        </td>
                                        <td class="px-6 py-4 border-y border-gray-50">
                                            <span class="px-4 py-1.5 text-[10px] font-black rounded-full border {{ $user->role == 'admin_menugo' ? 'bg-purple-50 text-purple-600 border-purple-100' : 'bg-green-50 text-green-600 border-green-100' }}">
                                                {{ strtoupper(str_replace('_', ' ', $user->role)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 border-y border-gray-50">
                                            @if($user->role !== 'admin_menugo')
                                                @php
                                                    $status = $user->umkm->status_verifikasi ?? 'pending';
                                                    $colorClass = match($status) {
                                                        'approved' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                                        'rejected' => 'bg-rose-50 text-rose-600 border-rose-100',
                                                        default => 'bg-amber-50 text-amber-600 border-amber-100',
                                                    };
                                                @endphp
                                                <span class="px-4 py-1.5 text-[10px] font-black rounded-full border {{ $colorClass }}">
                                                    {{ strtoupper($status) }}
                                                </span>
                                            @else
                                                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest italic">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 rounded-r-[1.5rem] border-y border-r border-gray-50">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    class="group flex items-center justify-center w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-sm"
                                                    title="Edit User">
                                                    <svg class="w-5 h-5 transition-transform group-hover:scale-110"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                    onsubmit="return confirm('Tindakan ini permanen. Hapus user {{ $user->name }}?')">
                                                    @csrf
                                                    @method('DELETE')
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
