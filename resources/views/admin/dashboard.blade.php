@extends('layouts.admin')
@section('title', 'Dashboard')

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
@if(session('error'))
<div class="toast-notif" style="background:#c53030;" id="toastError">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
    </svg>
    {{ session('error') }}
    <button onclick="document.getElementById('toastError').remove()" style="background:none;border:none;cursor:pointer;color:inherit;margin-left:8px;font-size:16px;">×</button>
</div>
@endif

{{-- Stats Cards --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Pengunjung</span>
            <span class="stat-value">{{ $totalPengunjung ?? 0 }}</span>
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
        <span class="stat-label">Total Layanan</span>
        <span class="stat-value">{{ $totalLayanan ?? 0 }}</span>
    </div>
    <div class="stat-icon">
        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="1.5">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
        </svg>
    </div>
</div>
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Portofolio</span>
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
            <span class="stat-label">Total Berita</span>
            <span class="stat-value">{{ $totalBerita ?? 0 }}</span>
        </div>
        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fb923c" stroke-width="1.5">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="8" y1="13" x2="16" y2="13"/>
                <line x1="8" y1="17" x2="16" y2="17"/>
                <line x1="8" y1="9" x2="10" y2="9"/>
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Total Testimoni</span>
            <span class="stat-value">{{ $totalTestimoni ?? 0 }}</span>
        </div>
        <div class="stat-icon">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="1.5">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                <line x1="9" y1="10" x2="15" y2="10"/>
                <line x1="9" y1="14" x2="13" y2="14"/>
            </svg>
        </div>
    </div>
</div>

{{-- Charts & Activity --}}
<div class="dashboard-middle">
    <div class="chart-card">
        <h3>Grafik Pengunjung</h3>
        <canvas id="visitorChart"></canvas>
    </div>

    <div class="activity-card">
        <h3>Aktivitas Terbaru</h3>
        <ul class="activity-list">
            @forelse($aktivitasTerbaru ?? [] as $aktivitas)
                <li>
                    <span class="activity-dot"></span>
                    <span>
                        {{ $aktivitas->admin_name ?? 'admin' }} 
                        <strong>{{ $aktivitas->aksi ?? 'aktivitas' }}</strong>
                        {{ $aktivitas->target ?? '' }}
                    </span>
                </li>
            @empty
                <li><span>Belum ada aktivitas</span></li>
            @endforelse
        </ul>
    </div>
</div>

{{-- Landing Page Settings --}}
<div class="settings-card">
    <h3>Landing Page</h3>
    <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Perusahaan <span style="color:red">*</span> :</label>
            <input type="text" name="nama_perusahaan" class="modal-input" placeholder="PT. Berkah Alam Tabantang" value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}">
        </div>
        <div class="form-group">
            <label>Tagline :</label>
            <textarea name="tagline" rows="2" placeholder="Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam">{{ old('tagline', $profil->tagline ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label>Deskripsi :</label>
            <textarea name="deskripsi" rows="3" placeholder="Deskripsi singkat perusahaan...">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label>Background Foto :</label>
            
            {{-- Preview dengan tombol delete --}}
            <div id="previewContainer" style="position: relative; display: {{ $profil && $profil->hero_image ? 'block' : 'none' }}; margin-bottom: 10px;">
                @if($profil && $profil->hero_image)
                    <img id="previewImage" src="{{ asset('storage/' . $profil->hero_image) }}" style="width:100%;max-height:200px;object-fit:cover;border-radius:8px;">
                    <button type="button" onclick="deleteBackground()" style="position: absolute; top: 10px; right: 10px; background: #e63946; color: white; border: none; border-radius: 50%; width: 32px; height: 32px; cursor: pointer; font-size: 18px; font-weight: bold; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.3); transition: all 0.2s;">
                        ×
                    </button>
                @endif
                <input type="hidden" name="delete_background" id="deleteBackgroundInput" value="0">
            </div>
            
            {{-- Upload area --}}
            <div class="upload-area" id="uploadArea" style="{{ $profil && $profil->hero_image ? 'display: none;' : '' }}">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                </svg>
                <p id="uploadText">Klik atau drag foto ke sini</p>
                <input type="file" name="hero_image" id="heroImageInput" accept="image/*">
            </div>
        </div>
        <div style="display:flex;gap:10px;">
            <button type="submit" class="btn-simpan">Simpan Perubahan</button>
            <a href="{{ route('home') }}" target="_blank" class="btn-simpan" style="background:#162660;text-decoration:none;text-align:center;display:inline-flex;align-items:center;gap:6px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15 3 21 3 21 9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
                Lihat Landing Page
            </a>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('visitorChart');
        
        if (!ctx) {
            console.error('Canvas tidak ditemukan!');
            return;
        }
        
        const labels = {!! json_encode($labels ?? ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']) !!};
        const dataValues = {!! json_encode($grafikData ?? [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]) !!};
        
        console.log('Labels:', labels);
        console.log('Data:', dataValues);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pengunjung',
                    data: dataValues,
                    borderColor: '#e63946',
                    backgroundColor: 'rgba(230, 57, 70, 0.08)',
                    borderWidth: 3,
                    pointBackgroundColor: '#e63946',
                    pointRadius: 5,
                    tension: 0.3,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: 'rgba(0,0,0,0.05)' } 
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    });

    const toast = document.getElementById('toastNotif');
    if (toast) setTimeout(() => toast.remove(), 3500);
    const toastError = document.getElementById('toastError');
    if (toastError) setTimeout(() => toastError.remove(), 3500);

    // Preview image saat upload
    document.getElementById('heroImageInput').addEventListener('change', function () {
        const file = this.files[0];
        const text = document.getElementById('uploadText');
        const previewContainer = document.getElementById('previewContainer');
        const uploadArea = document.getElementById('uploadArea');
        const deleteBackgroundInput = document.getElementById('deleteBackgroundInput');
        
        if (file) {
            text.textContent = 'Terpilih: ' + file.name;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                // Update atau buat preview
                let previewImage = document.getElementById('previewImage');
                if (!previewImage) {
                    previewContainer.innerHTML = `
                        <img id="previewImage" src="${e.target.result}" style="width:100%;max-height:200px;object-fit:cover;border-radius:8px;">
                        <button type="button" onclick="deleteBackground()" style="position: absolute; top: 10px; right: 10px; background: #e63946; color: white; border: none; border-radius: 50%; width: 32px; height: 32px; cursor: pointer; font-size: 18px; font-weight: bold; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.3); transition: all 0.2s;">
                            ×
                        </button>
                    `;
                } else {
                    previewImage.src = e.target.result;
                }
                
                previewContainer.style.display = 'block';
                uploadArea.style.display = 'none';
                deleteBackgroundInput.value = '0';
            };
            reader.readAsDataURL(file);
        } else {
            text.textContent = 'Klik atau drag foto ke sini';
        }
    });

    // Delete background
    function deleteBackground() {
        if (confirm('Yakin ingin menghapus background foto ini?')) {
            const previewContainer = document.getElementById('previewContainer');
            const uploadArea = document.getElementById('uploadArea');
            const heroImageInput = document.getElementById('heroImageInput');
            const deleteBackgroundInput = document.getElementById('deleteBackgroundInput');
            const uploadText = document.getElementById('uploadText');
            
            previewContainer.style.display = 'none';
            uploadArea.style.display = 'block';
            heroImageInput.value = '';
            uploadText.textContent = 'Klik atau drag foto ke sini';
            deleteBackgroundInput.value = '1';
        }
    }
</script>
@endpush