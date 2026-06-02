@extends('layouts.admin')
@section('title', 'Testimoni')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h1 class="page-heading">TESTIMONI</h1>
     <button class="btn-tambah"
       <button class="btn-tambah"
        onclick="document.getElementById('modalTambahTestimoni').style.display='flex'">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Testimoni
    </button>
</div>

{{-- Stats Cards --}}
<div class="stats-grid" style="grid-template-columns:repeat(2,1fr); max-width:700px;">

    <div class="stat-card">

        <div class="stat-info">
            <span class="stat-label">Total Ulasan</span>
            <span class="stat-value">{{ $totalUlasan ?? 5 }}</span>
        </div>

        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="1.5">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                <polyline points="9 11 11 13 15 9"/>
            </svg>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-info">
            <span class="stat-label">Rata-rata Rating</span>
            <span class="stat-value">{{ $rataRating ?? '4.5' }}</span>
        </div>

        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24"
                 fill="#f5c842"
                 stroke="#f5a800"
                 stroke-width="1">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
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
            {{--@foreach($layanans as $item)
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
<!-- MODAL TAMBAH TESTIMONI -->
<div class="modal-overlay"
     id="modalTambahTestimoni"
     onclick="if(event.target===this) this.style.display='none'">

    <div class="modal-box">

        <div class="modal-header">

            <h3 class="modal-title">
                TESTIMONI
            </h3>

            <button class="modal-close"
                onclick="document.getElementById('modalTambahTestimoni').style.display='none'">

                <svg width="20" height="20" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>

            </button>

        </div>

        <div class="modal-body">

            <div class="modal-field">
                <label>Nama</label>
                <input type="text"
                       class="modal-input"
                       placeholder="Masukkan nama">
            </div>

            <div class="modal-row">

                <div class="modal-field">
                    <label>Foto</label>
                    <input type="file"
                           class="modal-input"
                           accept="image/*">
                </div>

                <div class="modal-field">

                    <label>Rating</label>

                    <input type="hidden"
                           id="ratingValue"
                           value="0">

                    <div class="rating-input">

                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>

                    </div>

                    <small id="ratingText">
                        Pilih rating
                    </small>

                </div>

            </div>

            <div class="modal-field">

                <label>Ulasan</label>

                <textarea class="modal-input modal-textarea"
                          rows="5"
                          placeholder="Masukkan ulasan"></textarea>

            </div>

        </div>

        <div class="modal-footer">

            <button class="btn-modal-simpan">

                Simpan

                <svg width="16" height="16"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2.5">

                    <polyline points="20 6 9 17 4 12"/>

                </svg>

            </button>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('ratingValue');
    const ratingText = document.getElementById('ratingText');

    stars.forEach(star => {

        star.addEventListener('click', function () {

            const value = this.dataset.value;

            ratingValue.value = value;

            stars.forEach(s => {

                s.classList.toggle(
                    'active',
                    s.dataset.value <= value
                );

            });

            ratingText.textContent = value + ' / 5 Bintang';

        });

    });

});
</script>
@endsection