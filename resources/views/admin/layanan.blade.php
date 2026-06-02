@extends('layouts.admin')

@section('title', 'Layanan')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h1 class="page-heading">LAYANAN</h1>
     <button class="btn-tambah" onclick="document.getElementById('modalTambahProjek').style.display='flex'">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Layanan
    </button>
</div>

{{-- Stats Cards --}}
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Layanan</span>
            <span class="stat-value">{{ $totalLayanan ?? 0 }}</span>
        </div>

        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Layanan Aktif</span>
            <span class="stat-value">{{ $layananAktif ?? 0 }}</span>
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
            <span class="stat-label">Best Seller</span>
            <span class="stat-value">{{ $bestSeller ?? 0 }}</span>
        </div>

        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="1.5">
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                <polyline points="17 6 23 6 23 12"/>
            </svg>
        </div>
    </div>

</div>

{{-- Toolbar --}}
<div class="table-toolbar">
    <div class="search-table">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input type="text" placeholder="Search...">
    </div>
    <div class="toolbar-left">
        <div class="filter-dropdown">
            <select>
                <option>Semua kategori</option>
                <option>Engineering</option>
                <option>Infrastruktur</option>
                <option>Konstruksi</option>
            </select>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="6 9 12 15 18 9"/>
            </svg>
        </div>
        <div class="filter-dropdown">
            <select>
                <option>Status</option>
                <option>Aktif</option>
                <option>Nonaktif</option>
            </select>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="6 9 12 15 18 9"/>
            </svg>
        </div>
    </div>
</div>

{{-- Table --}}
<div class="table-card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Tindakan Administratif</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($layanans as $item)
            <tr>
                <td>
                    <div class="layanan-name">{{ $item->nama }}</div>
                    <div class="layanan-code">{{ $item->kode }}</div>
                </td>
                <td><span class="badge-kategori">{{ strtoupper($item->kategori) }}</span></td>
                <td>
                    <span class="badge-status {{ $item->status == 'aktif' ? 'publish' : 'draft' }}">
                        {{ strtoupper($item->status) }}
                    </span>
                </td>
                <td class="aksi-col">
                    <a href="#" class="btn-edit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </a>
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
            @endforeach --}}

            <tr>
                <td colspan="4" class="empty-state">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                    <p>Belum ada data layanan</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-overlay" id="modalTambahProjek" onclick="if(event.target===this) this.style.display='none'">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">LAYANAN</h3>
            <button class="modal-close" onclick="document.getElementById('modalTambahProjek').style.display='none'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-field">
                <label>Judul</label>
                <input type="text" class="modal-input" placeholder="">
            </div>

            <div class="modal-field">
                <label>Isi</label>
                <textarea class="modal-input modal-textarea" rows="4" placeholder=""></textarea>
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