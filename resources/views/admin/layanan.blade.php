@extends('layouts.admin')

@section('title', 'Layanan')

@section('content')

{{-- Flash Message --}}
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
    <button class="btn-tambah" onclick="bukaModalTambah()">
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
            <span class="stat-value">{{ $totalLayanan }}</span>
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
            <span class="stat-value">{{ $layananAktif }}</span>
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
            <span class="stat-value">{{ $layananNonAktif }}</span>
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

{{-- Toolbar --}}
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
    <table class="data-table" id="layananTable">
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Deskripsi</th>
                <th>Urutan</th>
                <th>Status</th>
                <th>Tindakan Administratif</th>
            </tr>
        </thead>
        <tbody>
            @forelse($layanans as $item)
            <tr data-status="{{ $item->status }}">
                <td>
                    <div style="display:flex; align-items:center; gap:10px;">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->judul_layanan }}"
                                 style="width:40px; height:40px; object-fit:cover; border-radius:6px;">
                        @else
                            <div style="width:40px; height:40px; background:#e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                                    <circle cx="8.5" cy="8.5" r="1.5"/>
                                    <polyline points="21 15 16 10 5 21"/>
                                </svg>
                            </div>
                        @endif
                        <div>
                            <div style="font-weight:600; color:#1e293b;">{{ $item->judul_layanan }}</div>
                            <div style="font-size:12px; color:#94a3b8;">{{ $item->icon }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    {{ Str::limit(strip_tags($item->deskripsi), 60) }}
                </td>
                <td>{{ $item->urutan }}</td>
                <td>
                    <span class="badge-status {{ $item->status === 'publish' ? 'publish' : 'draft' }}">
                        {{ $item->status === 'publish' ? 'PUBLISH' : 'UNPUBLISHED' }}
                    </span>
                </td>
                <td class="aksi-col">
                    <div class="aksi-wrapper">
                        {{-- Tombol Edit --}}
                        <button class="btn-edit"
                            data-id="{{ $item->id_layanan }}"
                            data-judul="{{ $item->judul_layanan }}"
                            data-deskripsi="{{ preg_replace('/\s+/', ' ', $item->deskripsi) }}"
                            data-icon="{{ $item->icon }}"
                            data-urutan="{{ $item->urutan }}"
                            data-status="{{ $item->status }}"
                            onclick="bukaModalEdit(this)">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </button>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.layanan.destroy', $item->id_layanan) }}"
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('Yakin hapus layanan ini?')">
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
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="empty-state">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                    <p>Belum ada data layanan</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ===================== MODAL TAMBAH ===================== --}}
<div class="modal-overlay" id="modalTambah" onclick="if(event.target===this) tutupModalTambah()">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">TAMBAH LAYANAN</h3>
            <button class="modal-close" onclick="tutupModalTambah()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" onsubmit="if(portoTambahEditor) portoTambahEditor.updateSourceElement();">
            @csrf
            <div class="modal-body" style="overflow-y: auto; flex: 1; padding-right: 8px; max-height: calc(90vh - 120px);">
                <div class="modal-field">
                    <label>Judul Layanan <span style="color:red">*</span></label>
                    <input type="text" name="judul_layanan" class="modal-input" required placeholder="Contoh: Konstruksi Gedung">
                </div>
                <div class="modal-field">
                    <label>Icon (nama icon)</label>
                    <input type="text" name="icon" class="modal-input" placeholder="Contoh: building">
                </div>
                <div class="modal-field">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="modal-input" accept="image/*">
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div class="modal-field">
                        <label>Urutan</label>
                        <input type="number" name="urutan" class="modal-input" value="0" min="0">
                    </div>
                    <div class="modal-field">
                        <label>Status <span style="color:red">*</span></label>
                        <select name="status" class="modal-input" required>
                            <option value="publish">Publish</option>
                            <option value="draft">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-field">
                    <label>Deskripsi <span style="color:red">*</span></label>
                    <textarea name="deskripsi" id="tambah_deskripsi" class="modal-input modal-textarea" rows="4" placeholder="Deskripsi layanan..."></textarea>
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

{{-- ===================== MODAL EDIT ===================== --}}
<div class="modal-overlay" id="modalEdit" onclick="if(event.target===this) tutupModalEdit()">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">EDIT LAYANAN</h3>
            <button class="modal-close" onclick="tutupModalEdit()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <form id="formEdit" action="" method="POST" enctype="multipart/form-data" onsubmit="if(portoEditEditor) portoEditEditor.updateSourceElement();">
            @csrf
            @method('PUT')
            <div class="modal-body" style="overflow-y: auto; flex: 1; padding-right: 8px; max-height: calc(90vh - 120px);">
                <div class="modal-field">
                    <label>Judul Layanan <span style="color:red">*</span></label>
                    <input type="text" name="judul_layanan" id="edit_judul" class="modal-input" required>
                </div>
                <div class="modal-field">
                    <label>Icon (nama icon)</label>
                    <input type="text" name="icon" id="edit_icon" class="modal-input">
                </div>
                <div class="modal-field">
                    <label>Gambar Baru (kosongkan jika tidak diganti)</label>
                    <input type="file" name="gambar" class="modal-input" accept="image/*">
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div class="modal-field">
                        <label>Urutan</label>
                        <input type="number" name="urutan" id="edit_urutan" class="modal-input" min="0">
                    </div>
                    <div class="modal-field">
                        <label>Status <span style="color:red">*</span></label>
                        <select name="status" id="edit_status" class="modal-input" required>
                            <option value="publish">Publish</option>
                            <option value="draft">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-field">
                    <label>Deskripsi <span style="color:red">*</span></label>
                    <textarea name="deskripsi" id="edit_deskripsi" class="modal-input modal-textarea" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
let layananTambahEditor, layananEditEditor;

function destroyEditor(editorRef) {
    if (editorRef && typeof editorRef.destroy === 'function') {
        editorRef.destroy();
    }
    return null;
}

function initTambahEditor() {
    const el = document.querySelector('#tambah_deskripsi');
    if (!el) return;
    if (layananTambahEditor) { layananTambahEditor = destroyEditor(layananTambahEditor); }
    ClassicEditor.create(el)
        .then(editor => { layananTambahEditor = editor; })
        .catch(error => { console.error(error); });
}

function bukaModalTambah() {
    initTambahEditor();
    document.getElementById('modalTambah').style.display = 'flex';
}

function tutupModalTambah() {
    document.getElementById('modalTambah').style.display = 'none';
    if (layananTambahEditor) { layananTambahEditor = destroyEditor(layananTambahEditor); }
}

function bukaModalEdit(button) {
    const d = button.dataset;
    document.getElementById('formEdit').action = '/admin/layanan/' + d.id;
    document.getElementById('edit_judul').value = d.judul;
    document.getElementById('edit_icon').value = d.icon;
    document.getElementById('edit_urutan').value = d.urutan;
    document.getElementById('edit_status').value = d.status;

    const ta = document.getElementById('edit_deskripsi');
    ta.value = d.deskripsi;
    if (layananEditEditor) { layananEditEditor = destroyEditor(layananEditEditor); }
    ClassicEditor.create(ta)
        .then(editor => { layananEditEditor = editor; })
        .catch(error => { console.error(error); });

    document.getElementById('modalEdit').style.display = 'flex';
}

function tutupModalEdit() {
    document.getElementById('modalEdit').style.display = 'none';
    if (layananEditEditor) { layananEditEditor = destroyEditor(layananEditEditor); }
}

// Filter tabel berdasarkan search & status
function filterTable() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const status = document.getElementById('filterStatus').value.toLowerCase();
    const rows   = document.querySelectorAll('#layananTable tbody tr[data-status]');

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
