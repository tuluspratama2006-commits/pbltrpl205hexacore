@extends('layouts.admin')

@section('title', 'Berita')

@section('content')

{{-- Toast Notif --}}
@if(session('success'))
<div class="toast-notif" id="toastNotif">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="20 6 9 17 4 12"/>
    </svg>
    {{ session('success') }}
    <button onclick="document.getElementById('toastNotif').remove()" style="background:none;border:none;cursor:pointer;color:inherit;margin-left:8px;font-size:16px;">×</button>
</div>
@endif

{{-- Header --}}
<div class="page-header">
    <h1 class="page-heading"></h1>
    <button class="btn-tambah" onclick="document.getElementById('modalTambahBerita').style.display='flex'">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Berita
    </button>
</div>

{{-- Stats Cards --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Post</span>
            <span class="stat-value">{{ $totalPost ?? 0 }}</span>
        </div>
        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2z"/>
                <line x1="8" y1="13" x2="16" y2="13"/>
                <line x1="8" y1="17" x2="16" y2="17"/>
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Published</span>
            <span class="stat-value">{{ $totalPublished ?? 0 }}</span>
        </div>
        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="1.5">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Unpublished</span>
            <span class="stat-value">{{ $totalDraft ?? 0 }}</span>
        </div>
        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#f472b6" stroke-width="1.5">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="9" y1="13" x2="15" y2="13"/>
                <line x1="9" y1="17" x2="12" y2="17"/>
            </svg>
        </div>
    </div>
</div>

{{-- Filter & Search --}}
<div class="table-toolbar">
    <div class="toolbar-left">
        <div class="filter-dropdown">
            <select id="filterKategori" onchange="filterTable()">
                <option value="">Semua kategori</option>
                <option value="Engineering">Engineering</option>
                <option value="Infrastruktur">Infrastruktur</option>
                <option value="Konstruksi">Konstruksi</option>
            </select>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="6 9 12 15 18 9"/>
            </svg>
        </div>
        <div class="filter-dropdown">
            <select id="filterStatus" onchange="filterTable()">
                <option value="">Status</option>
                <option value="publish">Publish</option>
                <option value="draft">Draft</option>
            </select>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="6 9 12 15 18 9"/>
            </svg>
        </div>
    </div>
    <div class="search-table">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input type="text" id="searchInput" placeholder="Search..." oninput="filterTable()">
    </div>
</div>

{{-- Table --}}
<div class="table-card">
    <table class="data-table" id="beritaTable">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal Terbit</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @forelse($beritas as $item)
            <tr data-status="{{ $item->status }}">
                <td>
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="table-img" alt="{{ $item->judul }}">
                    @else
                        <div style="width:70px;height:50px;background:#e2e8f0;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21 15 16 10 5 21"/>
                            </svg>
                        </div>
                    @endif
                </td>
                <td><a href="#" class="judul-link">{{ $item->judul }}</a></td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->tanggal_terbit ? \Carbon\Carbon::parse($item->tanggal_terbit)->format('d/m/y') : '-' }}</td>
                <td>
                    <span class="badge-status {{ $item->status == 'publish' ? 'publish' : 'draft' }}">
                        {{ strtoupper($item->status) }}
                    </span>
                </td>
                <td class="aksi-col">
                    <button class="btn-edit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </button>
                    <button class="btn-delete">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                            <path d="M10 11v6"/><path d="M14 11v6"/>
                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                        </svg>
                    </button>
                </td>
            </tr>
            @empty --}}
            <tr>
                <td colspan="6" class="empty-state">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2z"/>
                        <line x1="8" y1="13" x2="16" y2="13"/>
                        <line x1="8" y1="17" x2="16" y2="17"/>
                    </svg>
                    <p>Belum ada data berita</p>
                </td>
            </tr>
            {{-- @endforelse --}}
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH BERITA --}}
<div class="modal-overlay" id="modalTambahBerita" onclick="if(event.target===this) this.style.display='none'">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">TAMBAH BERITA</h3>
            <button class="modal-close" onclick="document.getElementById('modalTambahBerita').style.display='none'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-field">
                <label>Judul</label>
                <input type="text" class="modal-input" placeholder="Judul berita...">
            </div>
            <div class="modal-row">
                <div class="modal-field">
                    <label>Tanggal Terbit</label>
                    <input type="date" class="modal-input">
                </div>
                <div class="modal-field">
                    <label>Foto</label>
                    <input type="file" class="modal-input" accept="image/*">
                </div>
            </div>
            <div class="modal-row">
                <div class="modal-field">
                    <label>Penulis</label>
                    <input type="text" class="modal-input" placeholder="Nama penulis...">
                </div>
                <div class="modal-field">
                    <label>Status</label>
                    <select class="modal-input">
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
            <div class="modal-field">
                <label>Isi Berita</label>
                <textarea class="modal-input modal-textarea" rows="4" placeholder="Tulis isi berita..."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal-simpan">
                Simpan
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function filterTable() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const status = document.getElementById('filterStatus').value.toLowerCase();
    const rows   = document.querySelectorAll('#beritaTable tbody tr[data-status]');

    rows.forEach(row => {
        const text        = row.innerText.toLowerCase();
        const rowStatus   = row.getAttribute('data-status');
        const matchText   = text.includes(search);
        const matchStatus = status === '' || rowStatus === status;
        row.style.display = (matchText && matchStatus) ? '' : 'none';
    });
}

const toast = document.getElementById('toastNotif');
if (toast) setTimeout(() => toast.remove(), 3500);
</script>
@endpush