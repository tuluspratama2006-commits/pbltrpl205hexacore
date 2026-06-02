@extends('layouts.admin')

@section('title', 'Berita')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h1 class="page-heading">BERITA</h1>
  <button class="btn-tambah" onclick="document.getElementById('modalTambahProjek').style.display='flex'">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Berita
    </button>
</div>


{{-- Filter + Stats --}}
<div class="berita-top">
    <div class="berita-filter-card">
        <span class="filter-label">Filter By:</span>
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

    <div class="berita-stats">
        <div class="berita-stat-card">
            <span class="berita-stat-label">Total post :</span>
            <span class="berita-stat-value">{{ $totalPost ?? 0 }}</span>
        </div>
        <div class="berita-stat-card highlight">
            <span class="berita-stat-label">Total Draft :</span>
            <span class="berita-stat-value">{{ $totalDraft ?? 0 }}</span>
        </div>
    </div>
</div>

{{-- Table --}}
<div class="table-card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal Terbit</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Nanti diisi @foreach dari database:
            @foreach($beritas as $item)
            <tr>
                <td>
                    <a href="#" class="judul-link">{{ $item->judul }}</a>
                </td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->tanggal_terbit ? \Carbon\Carbon::parse($item->tanggal_terbit)->format('d/m/y') : '-' }}</td>
                <td>
                    <span class="badge-status {{ $item->status == 'publish' ? 'publish' : 'draft' }}">
                        {{ ucfirst($item->status) }}
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
            @endforeach
            --}}

            {{-- Placeholder kosong --}}
            <tr>
                <td colspan="5" class="empty-state">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2z"/>
                        <line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="16" y2="17"/>
                    </svg>
                    <p>Belum ada data berita</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-overlay" id="modalTambahProjek" onclick="if(event.target===this) this.style.display='none'">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">BERITA</h3>
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