@extends('layouts.admin')

@section('title', 'Portofolio')

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
    <h1 class="page-heading" style="text-decoration: underline; text-underline-offset: 6px;"></h1>
    <button class="btn-tambah" onclick="bukaModalTambahPortofolio()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Tambah Portofolio
    </button>
</div>

{{-- Stats Cards --}}
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Portofolio</span>
            <span class="stat-value">{{ $totalPortofolio ?? 0 }}</span>
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
            <span class="stat-value">{{ $Portofoliopublished ?? 0 }}</span>
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
            <span class="stat-value">{{ $Portofoliounpublished ?? 0 }}</span>
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
            <select id="filterStatus" onchange="filterTable()">
                <option value="">Status</option>
                <option value="publish">Publish</option>
                <option value="draft">Unpublished</option>
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
    <table class="data-table" id="portofolioTable">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Proyek</th>
                <th>Klien</th>
                <th>Tanggal Proyek</th>
                <th>Lokasi</th>
                <th>Dokumen</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($semuaPortofolio as $item)
            <tr data-status="{{ $item->status }}">
                <td>
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->nama_projek }}" class="table-img">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $item->judul_proyek }}</td>
                <td>{{ $item->nama_klien }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_proyek)->format('d M Y') }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>
                    @if($item->file_pdf)
                        <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank" class="btn-link" style="color: #2563eb; text-decoration: underline;">
                            Lihat PDF
                        </a>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <span class="badge-status {{ $item->status == 'publish' ? 'publish' : 'draft' }}">
                        {{ $item->status == 'publish' ? 'Publish' : 'Unpublished' }}
                    </span>
                </td>
                    <td class="aksi-col">
                    <div class="aksi-wrapper">
                        <button class="btn-edit"
                            data-id="{{ $item->id_portofolio }}"
                            data-judul="{{ $item->judul_proyek }}"
                            data-tanggal="{{ $item->tanggal_proyek }}"
                            data-klien="{{ $item->nama_klien }}"
                            data-lokasi="{{ $item->lokasi }}"
                            data-status="{{ $item->status }}"
                            data-deskripsi="{{ preg_replace('/\s+/', ' ', $item->deskripsi) }}"
                            data-thumbnail="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : '' }}"
                            data-pdf="{{ $item->file_pdf ? asset('storage/' . $item->file_pdf) : '' }}"
                            onclick="bukaModalEditPortofolio(this)">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </button>

                       <form action="{{ route('admin.portofolio.destroy', $item->id_portofolio) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus data portofolio ini?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" title="Hapus Portofolio">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3 6 5 6 21 6"/>
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                    <path d="M10 11v6"/>
                                    <path d="M14 11v6"/>
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="empty-state">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="1.5">
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                        <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                    </svg>
                    <p>Belum ada data portofolio</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH PORTOFOLIO --}}
<div class="modal-overlay" id="modalTambahPortofolio" onclick="if(event.target===this) tutupModalTambahPortofolio()">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">PORTOFOLIO</h3>
            <button class="modal-close" onclick="tutupModalTambahPortofolio()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data" onsubmit="if(portoTambahEditor) portoTambahEditor.updateSourceElement();">
            @csrf
            {{-- Body: fitur SCROLL --}}
            <div class="modal-body" style="overflow-y: auto; flex: 1; padding-right: 8px; max-height: calc(90vh - 120px);">
                <div class="modal-field">
                    <label>Nama Proyek <span style="color:red">*</span></label>
                    <input type="text" name="judul_proyek" class="modal-input" placeholder="Nama proyek..." required>
                </div>
                <div class="modal-row" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div class="modal-field">
                        <label>Tanggal Proyek <span style="color:red">*</span></label>
                        <input type="date" name="tanggal_proyek" class="modal-input" required>
                    </div>
                    <div class="modal-field">
                        <label>Foto Portofolio <span style="color:red">*</span></label>
                        <input type="file" name="thumbnail" class="modal-input" accept="image/jpeg,image/png,image/jpg" required>
                    </div>
                </div>
                <div class="modal-row" style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top: 8px;">
                    <div class="modal-field">
                        <label>Klien <span style="color:red">*</span></label>
                        <input type="text" name="nama_klien" class="modal-input" placeholder="Nama klien..." required>
                    </div>
                    <div class="modal-field">
                        <label>Lokasi <span style="color:red">*</span></label>
                        <input type="text" name="lokasi" class="modal-input" placeholder="Lokasi proyek..." required>
                    </div>
                </div>
                <div class="modal-row" style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top: 8px;">
                    <div class="modal-field">
                        <label>Dokumen</label>
                        <input type="file" name="file_pdf" class="modal-input" accept="application/pdf">
                    </div>
                    <div class="modal-field">
                        <label>Status <span style="color:red">*</span></label>
                    <select name="status" class="modal-input" required>
                        <option value="publish">Publish</option>
                        <option value="draft">Unpublished</option>
                    </select>
                    </div>
                </div>
                <div class="modal-field" style="margin-top: 8px;">
                    <label>Isi / Deskripsi<span style="color:red">*</span></label>
                    <textarea name="deskripsi" id="tambah_deskripsi" class="modal-input modal-textarea" rows="4" placeholder="Tulis deskripsi lengkap proyek..."></textarea>
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
    </div>
</div>

{{-- MODAL EDIT PORTOFOLIO --}}
<div class="modal-overlay" id="modalEditPortofolio" onclick="if(event.target===this) tutupModalEditPortofolio()">
    <div class="modal-box">

        {{-- Header: Tetap di atas --}}
        <div class="modal-header">
            <h3 class="modal-title">EDIT PORTOFOLIO</h3>
            <button class="modal-close" onclick="tutupModalEditPortofolio()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <form id="formEditPortofolio" action="" method="POST" enctype="multipart/form-data" onsubmit="if(portoEditEditor) portoEditEditor.updateSourceElement();">
            @csrf
            @method('PUT')
            {{-- Body: fitur SCROLL --}}
            <div class="modal-body" style="overflow-y: auto; flex: 1; padding-right: 8px; max-height: calc(90vh - 120px);">
                <div class="modal-field">
                    <label>Nama Proyek <span style="color:red">*</span></label>
                    <input type="text" name="judul_proyek" id="edit_judul_proyek" class="modal-input" required>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div class="modal-field">
                        <label>Tanggal Proyek <span style="color:red">*</span></label>
                        <input type="date" name="tanggal_proyek" id="edit_tanggal_proyek" class="modal-input" required>
                    </div>
                    <div class="modal-field">
                        <label>Foto Baru</label>
                        <input type="file" name="thumbnail" class="modal-input" accept="image/jpeg,image/png,image/jpg">

                        {{-- Perbaikan: Ditata rapi agar tidak merusak layout saat muncul --}}
                        <div style="margin-top: 8px;">
                            <a id="preview_thumbnail" href="" target="_blank" style="display: none; font-size: 13px; color: #2563eb; text-decoration: underline;">
                                Lihat Foto Sebelumnya
                            </a>
                        </div>
                    </div>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top: 8px;">
                    <div class="modal-field">
                        <label>Klien <span style="color:red">*</span></label>
                        <input type="text" name="nama_klien" id="edit_nama_klien" class="modal-input" required>
                    </div>
                    <div class="modal-field">
                        <label>Lokasi <span style="color:red">*</span></label>
                        <input type="text" name="lokasi" id="edit_lokasi" class="modal-input" required>
                    </div>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top: 8px;">
                    <div class="modal-field">
                        <label>Dokumen Baru</label>
                        <input type="file" name="file_pdf" class="modal-input" accept="application/pdf">
                        <div style="margin-top: 6px;">
                            <a id="preview_pdf" href="" target="_blank" style="display: none; font-size: 13px; color: #2563eb; text-decoration: underline;">
                                📄 Lihat PDF Sebelumnya
                            </a>
                        </div>
                    </div>
                    <div class="modal-field">
                        <label>Status <span style="color:red">*</span></label>
                        <select name="status" id="edit_status" class="modal-input" required>
                            <option value="publish">Publish</option>
                            <option value="draft">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-field" style="margin-top: 8px;">
                    <label>Isi / Deskripsi<span style="color:red">*</span></label>
                    <textarea name="deskripsi" id="edit_deskripsi" class="modal-input modal-textarea" rows="4"></textarea>
                </div>

            </div>
            <div class="modal-footer" style="padding-top: 12px;">
                <button type="submit" class="btn-modal-simpan">
                    Update
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
let portoTambahEditor, portoEditEditor;

function destroyEditor(editorRef) {
    if (editorRef && typeof editorRef.destroy === 'function') {
        editorRef.destroy();
    }
    return null;
}

function initTambahEditor() {
    const el = document.querySelector('#tambah_deskripsi');
    if (!el) return;
    if (portoTambahEditor) { portoTambahEditor = destroyEditor(portoTambahEditor); }
    ClassicEditor.create(el)
        .then(editor => { portoTambahEditor = editor; })
        .catch(error => { console.error(error); });
}

function bukaModalTambahPortofolio() {
    initTambahEditor();
    document.getElementById('modalTambahPortofolio').style.display = 'flex';
}

function bukaModalEditPortofolio(button) {
    const d = button.dataset;
    document.getElementById('formEditPortofolio').action = '{{ url("admin/portofolio") }}/' + d.id;
    document.getElementById('edit_judul_proyek').value = d.judul;
    document.getElementById('edit_tanggal_proyek').value = d.tanggal;
    document.getElementById('edit_nama_klien').value = d.klien;
    document.getElementById('edit_lokasi').value = d.lokasi;
    document.getElementById('edit_status').value = d.status;

    const ta = document.getElementById('edit_deskripsi');
    ta.value = d.deskripsi;
    if (portoEditEditor) { portoEditEditor = destroyEditor(portoEditEditor); }
    ClassicEditor.create(ta)
        .then(editor => { portoEditEditor = editor; })
        .catch(error => { console.error(error); });

    const previewImg = document.getElementById('preview_thumbnail');
    if (previewImg && d.thumbnail) {
        previewImg.href = d.thumbnail;
        previewImg.style.display = 'block';
    } else if (previewImg) {
        previewImg.style.display = 'none';
    }

    const previewPdf = document.getElementById('preview_pdf');
    if (previewPdf && d.pdf) {
        previewPdf.href = d.pdf;
        previewPdf.style.display = 'inline-block';
    } else if (previewPdf) {
        previewPdf.style.display = 'none';
    }

    document.getElementById('modalEditPortofolio').style.display = 'flex';
}

function filterTable() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const status = document.getElementById('filterStatus').value.toLowerCase();

    const rows = document.querySelectorAll('#portofolioTable tbody tr[data-status]');

    rows.forEach(row => {
        const text        = row.innerText.toLowerCase();
        const rowStatus   = row.getAttribute('data-status');
        const matchText   = text.includes(search);
        const matchStatus = status === '' || rowStatus === status;

        row.style.display = (matchText && matchStatus) ? '' : 'none';
    });
}

function tutupModalTambahPortofolio() {
    document.getElementById('modalTambahPortofolio').style.display = 'none';
    if (portoTambahEditor) { portoTambahEditor = destroyEditor(portoTambahEditor); }
}

function tutupModalEditPortofolio() {
    document.getElementById('modalEditPortofolio').style.display = 'none';
    if (portoEditEditor) { portoEditEditor = destroyEditor(portoEditEditor); }
}

const toast = document.getElementById('toastNotif');
if (toast) setTimeout(() => toast.remove(), 3500);
</script>
@endpush

