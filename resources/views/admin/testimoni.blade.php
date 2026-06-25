@extends('layouts.admin')
@section('title', 'Testimoni')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h1 class="page-heading" style="text-decoration: underline; text-underline-offset: 6px;"></h1>
    <button class="btn-tambah"
        onclick="bukaModalTambahTestimoni()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Testimoni
    </button>
</div>

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

{{-- Stats Cards --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Ulasan</span>
            <span class="stat-value">{{ $totalUlasan ?? 0 }}</span>
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
            <span class="stat-value">{{ number_format($rataRating ?? 0, 4) }}</span>
        </div>
        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24"
                 fill="#f5c842" stroke="#f5a800" stroke-width="1">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
            </svg>
        </div>
    </div>
</div>

{{-- Toolbar --}}
<div class="table-toolbar">
    <div class="toolbar-left">
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
        <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterTable()">
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
        <tbody id="tableBody">
    @if(isset($testimonis) && $testimonis->count() > 0)
        @foreach($testimonis as $item)
    <tr data-status="{{ $item->status }}" data-search="{{ strtolower($item->nama_client . ' ' . ($item->nama_perusahaan ?? '')) }}">
        <td>
            <div class="layanan-name">
                @if($item->foto_client)
                    <img src="{{ asset('storage/' . $item->foto_client) }}" style="width:40px;height:40px;border-radius:8px;object-fit:cover;margin-right:10px;">
                @endif
                {{ $item->nama_client }}
            </div>
            <div class="layanan-code">{{ $item->jabatan ?? '-' }}</div>
        </td>
        <td><span class="badge-kategori">{{ $item->nama_perusahaan ?? '-' }}</span></td>
        <td>
            <span class="badge-status {{ $item->status }}">
                {{ strtoupper($item->status) }}
            </span>
        </td>
        <td class="aksi-col">
            <button class="btn-edit"
                data-json='@json($item)'
                onclick="openEditModal(this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
            </button>
            <form action="{{ route('admin.testimoni.destroy', $item->id_testimoni) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                        <path d="M10 11v6"/><path d="M14 11v6"/>
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                    </svg>
                </button>
            </form>
        </td>
    </tr>
@endforeach
    @else
        <tr>
            <td colspan="4" class="empty-state">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                </svg>
                <p>Belum ada data testimoni</p>
            </td>
        </tr>
    @endif
</tbody>
    </table>
</div>

<!-- MODAL TAMBAH TESTIMONI -->
<div class="modal-overlay"
     id="modalTambahTestimoni"
     onclick="if(event.target===this) tutupModalTestimoni()">

    <div class="modal-box">

        <div class="modal-header">
            <h3 class="modal-title">TESTIMONI</h3>
            <button class="modal-close"
                onclick="tutupModalTestimoni()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        {{-- ⬇️ FORM YANG BENAR ⬇️ --}}
        <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-body" style="overflow-y: auto; flex: 1; padding-right: 8px; max-height: calc(90vh - 120px);">

                <div class="modal-field">
                    <label>Nama</label>
                    <input type="text"
                           name="nama_client"
                           class="modal-input"
                           placeholder="Masukkan nama"
                           required>
                </div>

                <div class="modal-row">
                    <div class="modal-field">
                        <label>Jabatan</label>
                        <input type="text"
                               name="jabatan"
                               class="modal-input"
                               placeholder="Masukkan jabatan">
                    </div>
                    <div class="modal-field">
                        <label>Nama Perusahaan</label>
                        <input type="text"
                               name="nama_perusahaan"
                               class="modal-input"
                               placeholder="Masukkan nama perusahaan">
                    </div>
                </div>

                <div class="modal-row">
                    <div class="modal-field">
                        <label>Foto</label>
                        <input type="file"
                               name="foto_client"
                               class="modal-input"
                               accept="image/*">
                    </div>

                    <div class="modal-field">
                        <label>Rating</label>
                        <input type="hidden"
                               name="rating"
                               id="ratingValue"
                               value="5"
                               required>

                        <div class="rating-input">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>

                        <small id="ratingText">5 / 5 Bintang</small>
                    </div>
                </div>

                <div class="modal-field">
                    <label>Ulasan</label>
                    <textarea class="modal-input modal-textarea"
                              name="isi_testimoni"
                              rows="5"
                              placeholder="Masukkan ulasan"
                              required></textarea>
                </div>

                <div class="modal-field">
                    <label>Status</label>
                    <select name="status" class="modal-input" required>
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn-modal-simpan">
                    Simpan
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </button>
            </div>
        </form>
        {{-- ⬆️ FORM SELESAI ⬆️ --}}

    </div>

</div>

<script>
const toast = document.getElementById('toastNotif');
if (toast) setTimeout(() => toast.remove(), 3500);

function resetForm() {
    const form = document.querySelector('#modalTambahTestimoni form');
    form.action = '{{ route("admin.testimoni.store") }}';
    form.querySelector('[name="nama_client"]').value = '';
    form.querySelector('[name="jabatan"]').value = '';
    form.querySelector('[name="nama_perusahaan"]').value = '';
    form.querySelector('[name="isi_testimoni"]').value = '';
    form.querySelector('[name="status"]').value = 'publish';

    const methodField = document.getElementById('methodField');
    if (methodField) methodField.remove();

    const stars = document.querySelectorAll('.star');
    stars.forEach(s => {
        s.classList.toggle('active', s.dataset.value <= 5);
    });
    document.getElementById('ratingValue').value = 5;
    document.getElementById('ratingText').textContent = '5 / 5 Bintang';

    const modalTitle = document.querySelector('#modalTambahTestimoni .modal-title');
    if (modalTitle) modalTitle.textContent = 'TESTIMONI';
    const submitBtn = document.querySelector('#modalTambahTestimoni .btn-modal-simpan');
    if (submitBtn) submitBtn.innerHTML = 'Simpan <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>';
}

function bukaModalTambahTestimoni() {
    resetForm();
    document.getElementById('modalTambahTestimoni').style.display = 'flex';
}

function tutupModalTestimoni() {
    document.getElementById('modalTambahTestimoni').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('ratingValue');
    const ratingText = document.getElementById('ratingText');

    stars.forEach(s => s.classList.add('active'));

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = this.dataset.value;
            ratingValue.value = value;
            stars.forEach(s => {
                s.classList.toggle('active', s.dataset.value <= value);
            });
            ratingText.textContent = value + ' / 5 Bintang';
        });
    });
});

function filterTable() {
    const status = document.getElementById('filterStatus').value.toLowerCase();
    const search = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr[data-status]');

    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        const rowSearch = row.getAttribute('data-search');
        const matchStatus = !status || rowStatus === status;
        const matchSearch = !search || rowSearch.includes(search);
        row.style.display = matchStatus && matchSearch ? '' : 'none';
    });
}

function openEditModal(button) {
    const d = JSON.parse(button.getAttribute('data-json'));

    const form = document.querySelector('#modalTambahTestimoni form');
    form.action = '{{ url("admin/testimoni") }}/' + d.id_testimoni;

    if (!document.getElementById('methodField')) {
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT';
        methodInput.id = 'methodField';
        form.appendChild(methodInput);
    } else {
        document.getElementById('methodField').value = 'PUT';
    }

    form.querySelector('[name="nama_client"]').value = d.nama_client;
    form.querySelector('[name="jabatan"]').value = d.jabatan || '';
    form.querySelector('[name="nama_perusahaan"]').value = d.nama_perusahaan || '';
    form.querySelector('[name="isi_testimoni"]').value = d.isi_testimoni;
    form.querySelector('[name="status"]').value = d.status;
    document.getElementById('ratingValue').value = d.rating;

    const stars = document.querySelectorAll('.star');
    stars.forEach(s => {
        s.classList.toggle('active', s.dataset.value <= d.rating);
    });
    document.getElementById('ratingText').textContent = d.rating + ' / 5 Bintang';

    document.querySelector('#modalTambahTestimoni .modal-title').textContent = 'EDIT TESTIMONI';
    const submitBtn = document.querySelector('#modalTambahTestimoni .btn-modal-simpan');
    submitBtn.innerHTML = 'Update <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>';

    document.getElementById('modalTambahTestimoni').style.display = 'flex';
}

</script>
@endsection