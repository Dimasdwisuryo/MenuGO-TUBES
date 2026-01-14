@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-white shadow-sm" id="sidebar-wrapper" style="min-width: 250px; min-height: 100vh;">
        <div class="sidebar-heading p-4 fs-4 fw-bold text-success border-bottom">
            Menu<span class="text-dark">GO</span>
        </div>
        <div class="list-group list-group-flush p-3">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action rounded-3 border-0 mb-2">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action rounded-3 border-0 mb-2">
                <i class="bi bi-people me-2"></i> Manajemen User
            </a>
            <a href="{{ route('admin.umkm.index') }}" class="list-group-item list-group-item-action rounded-3 border-0 active bg-success mb-2">
                <i class="bi bi-shop me-2"></i> Data UMKM
            </a>
            <hr>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action rounded-3 border-0 text-danger">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
        </div>
    </div>

    <div id="page-content-wrapper" class="w-100 p-4 bg-light">
        <div class="container-fluid">
            <h3 class="fw-bold mb-4 text-dark">Direktori Bisnis UMKM</h3>

            <div class="row g-4">
                @forelse($umkmList as $umkm)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <div class="bg-success" style="height: 5px;"></div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light-success p-2 rounded-3 me-3">
                                    <i class="bi bi-shop fs-3 text-success"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0">{{ $umkm->name }}</h5>
                                    <small class="text-muted">Terdaftar: {{ $umkm->created_at->format('d M Y') }}</small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded-3 mb-3">
                                <span class="small text-muted">Koleksi Menu</span>
                                <span class="badge bg-success rounded-pill">{{ $umkm->menus_count }} Item</span>
                            </div>

                            <div class="mb-3 small text-truncate">
                                <i class="bi bi-envelope text-muted me-1"></i> {{ $umkm->email }}
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-outline-success btn-sm rounded-pill fw-bold"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $umkm->id }}">
                                    Detail Toko
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalDetail{{ $umkm->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content rounded-4 border-0 shadow">
                            <div class="modal-header border-bottom p-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-success p-3 rounded-circle me-3">
                                        <i class="bi bi-shop fs-3 text-success"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold mb-0">{{ $umkm->name }}</h4>
                                        <p class="text-muted mb-0">{{ $umkm->email }}</p>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 bg-light">
                                <h5 class="fw-bold mb-3">Katalog Menu</h5>
                                <div class="row g-3">
                                    @forelse($umkm->menus as $menu)
                                    <div class="col-md-4">
                                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                                            <div style="height: 150px; overflow: hidden; background-color: #eee;">
                                                @if($menu->foto)
                                                    <img src="{{ asset('storage/' . $menu->foto) }}" class="w-100 h-100" style="object-fit: cover;">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center h-100 text-muted">No Image</div>
                                                @endif
                                            </div>
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-start mb-1">
                                                    <div>
                                                        <p class="text-success small fw-bold mb-0">{{ $menu->kategori }}</p>
                                                        <h6 class="fw-bold mb-0 text-dark">{{ $menu->nama_menu }}</h6>
                                                    </div>
                                                    @if($menu->level)
                                                        <span class="badge bg-danger rounded-pill small">Lvl {{ $menu->level }}</span>
                                                    @endif
                                                </div>
                                                <p class="text-success fw-bold small mb-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                                <p class="text-muted small mb-0 text-truncate">{{ $menu->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 text-center py-4">
                                        <i class="bi bi-patch-question fs-1 text-muted"></i>
                                        <p class="text-muted">Toko ini belum menambahkan menu.</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="modal-footer border-0 p-4 pt-0 bg-light">
                                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada data UMKM yang terdaftar.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
    .bg-light-success { background-color: #e8f5e9; }
    .rounded-4 { border-radius: 1.25rem !important; }
    .modal-xl { max-width: 1140px; }
</style>
@endsection
