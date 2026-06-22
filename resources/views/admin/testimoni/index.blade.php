@extends('layouts.admin')

@section('title', 'Testimoni')

@section('content')
<div class="container">
    <!-- Header Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-label">TOTAL ULASAN</div>
                <div class="stat-value">{{ $totalUlasan }}</div>
            </div>
            <div class="stat-icon green">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-label">RATA-RATA RATING</div>
                <div class="stat-value">{{ number_format($rataRating, 4) }}</div>
            </div>
            <div class="stat-icon yellow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="action-bar">
        <div class="filter-group">
            <button class="btn-filter">
                Status
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div class="search-box">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.35-4.35"/>
            </svg>
            <input type="text" placeholder="Search..." id="searchInput" onkeyup="searchTable()">
        </div>
        <button class="btn-primary" onclick="document.getElementById('modalTambah').style.display='flex'">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Tambah Testimoni
        </button>
    </div>

    <!-- Table -->
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Layanan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tindakan Administratif</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonis as $item)
                <tr data-status="{{ $item->status }}">
                    <td>
                        <div style="display:flex; align-items:center; gap:12px;">
                            @if($item->foto_client)
                                <img src="{{ asset('storage/' . $item->foto_client) }}" 
                                     alt="{{ $item->nama_client }}" 
                                     style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                            @else
                                <div style="width:40px; height:40px; background:#e2e8f0; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <div style="font-weight:600; color:#1e293b;">{{ $item->nama_client }}</div>
                                <div style="font-size:12px; color:#94a3b8;">{{ $item->jabatan }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="color:#64748b;">{{ $item->nama_perusahaan }}</td>
                    <td>
                        <span class="badge-status {{ $item->status }}">
                            {{ $item->status == 'publish' ? 'PUBLISH' : 'UNPUBLISHED' }}
                        </span>
                    </td>
                    <td class="aksi-col">
                        <div class="aksi-wrapper">
                            <button class="btn-edit" onclick="bukaModalEdit({{ $item->id_testimoni }})">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </button>

                            <form action="{{ route('admin.testimoni.destroy', $item->id_testimoni) }}" 
                                  method="POST" style="display:inline;" 
                                  onsubmit="return confirm('Yakin hapus testimoni ini?')">
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
                    <td colspan="4">
                        <div class="empty-state">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                            </svg>
                            <p>Belum ada data layanan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal-overlay" id="modalTambah" onclick="if(event.target===this) this.style.display='none'">
    <div class="modal-box">
        <div class="modal-header">
            <h3>TAMBAH TESTIMONI</h3>
            <button class="btn-close" onclick="document.getElementById('modalTambah').style.display='none'">&times;</button>
        </div>
        <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_client" required placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto_client" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <div style="display: flex; gap: 10px; font-size: 24px;">
                        @for($i = 1; $i <= 5; $i++)
                        <label style="cursor: pointer;">
                            <input type="radio" name="rating" value="{{ $i }}" style="display:none;" required onchange="selectRating({{ $i }})">
                            <span id="star{{ $i }}">★</span>
                        </label>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label>Ulasan</label>
                    <textarea name="isi_testimoni" required placeholder="Masukkan ulasan"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="publish">Publish</option>
                        <option value="draft">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('modalTambah').style.display='none'">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal-overlay" id="modalEdit" onclick="if(event.target===this) this.style.display='none'">
    <div class="modal-box">
        <div class="modal-header">
            <h3>EDIT TESTIMONI</h3>
            <button class="btn-close" onclick="document.getElementById('modalEdit').style.display='none'">&times;</button>
        </div>
        <form id="formEdit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_client" id="editNamaClient" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto_client" id="editFotoClient" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <div style="display: flex; gap: 10px; font-size: 24px;">
                        @for($i = 1; $i <= 5; $i++)
                        <label style="cursor: pointer;">
                            <input type="radio" name="rating" value="{{ $i }}" id="editRating{{ $i }}" style="display:none;" required onchange="selectEditRating({{ $i }})">
                            <span id="editStar{{ $i }}">★</span>
                        </label>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label>Ulasan</label>
                    <textarea name="isi_testimoni" id="editIsiTestimoni" required></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="editStatus" required>
                        <option value="publish">Publish</option>
                        <option value="draft">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="document.getElementById('modalEdit').style.display='none'">Batal</button>
                <button type="submit" class="btn-save">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const rows = document.querySelectorAll('table tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
}

function selectRating(rating) {
    for (let i = 1; i <= 5; i++) {
        document.getElementById('star' + i).style.color = i <= rating ? '#fbbf24' : '#94a3b8';
    }
}

function selectEditRating(rating) {
    for (let i = 1; i <= 5; i++) {
        document.getElementById('editStar' + i).style.color = i <= rating ? '#fbbf24' : '#94a3b8';
    }
}

function bukaModalEdit(id) {
    fetch(`/admin/testimoni/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editNamaClient').value = data.nama_client;
            document.getElementById('editIsiTestimoni').value = data.isi_testimoni;
            document.getElementById('editStatus').value = data.status;
            
            for (let i = 1; i <= 5; i++) {
                document.getElementById('editRating' + i).checked = (i == data.rating);
                document.getElementById('editStar' + i).style.color = i <= data.rating ? '#fbbf24' : '#94a3b8';
            }
            
            document.getElementById('formEdit').action = '/admin/testimoni/' + id;
            document.getElementById('modalEdit').style.display = 'flex';
        });
}
</script>
@endpush