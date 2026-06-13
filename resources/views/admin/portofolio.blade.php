@extends('layouts.admin')

@section('title', 'Portofolio')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h1 class="page-heading"></h1>
    <button class="btn-tambah" onclick="document.getElementById('modalTambahProjek').style.display='flex'">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Projek
    </button>
</div>

{{-- Stats Cards --}}
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Projek</span>
            <span class="stat-value">{{ $totalProjek ?? 0 }}</span>
        </div>

        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="1.5">
                <rect x="2" y="7" width="20" height="14" rx="2"/>
                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                <line x1="12" y1="12" x2="12" y2="16"/>
                <line x1="10" y1="14" x2="14" y2="14"/>
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
                <option>Publish</option>
                <option>Draft</option>
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
        <input type="text" placeholder="Search...">
    </div>
</div>

{{-- Table --}}
<div class="table-card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Projek</th>
                <th>Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($portofolios as $item)
            <tr>
                <td><img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_projek }}" class="table-img"></td>
                <td>{{ $item->nama_projek }}</td>
                <td><span class="badge-kategori">{{ $item->kategori }}</span></td>
                <td>{{ $item->created_at->format('d/m/y') }}</td>
                <td>
                    <span class="badge-status {{ $item->status == 'publish' ? 'publish' : 'draft' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td class="aksi-col">
                    <a href="#" class="btn-edit">...</a>
                    <button class="btn-delete">...</button>
                </td>
            </tr>
            @endforeach --}}

            <tr>
                <td colspan="6" class="empty-state">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="1.5">
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                        <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                    </svg>
                    <p>Belum ada data portofolio</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH PROJEK --}}
<div class="modal-overlay" id="modalTambahProjek" onclick="if(event.target===this) this.style.display='none'">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">PORTOFOLIO</h3>
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
            <div class="modal-row">
                <div class="modal-field">
                    <label>Tanggal</label>
                    <input type="date" class="modal-input">
                </div>
                <div class="modal-field">
                    <label>Foto</label>
                    <input type="file" class="modal-input" accept="image/*">
                </div>
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