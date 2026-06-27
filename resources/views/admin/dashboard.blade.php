@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

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

{{-- Landing Page Settings --}}
<div class="settings-card">
    <h3>Landing Page</h3>
    <div class="form-group">
        <label>Judul :</label>
        <textarea rows="3" placeholder="Masukkan judul landing page...">{{ old('judul', $profil->judul ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label>Background Foto :</label>
        <div class="upload-area">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="3" y="3" width="18" height="18" rx="2"/>
                <circle cx="8.5" cy="8.5" r="1.5"/>
                <polyline points="21 15 16 10 5 21"/>
            </svg>
            <p>Klik atau drag foto ke sini</p>
            <input type="file" accept="image/*">
        </div>
    </div>
    <button class="btn-simpan">Simpan Perubahan</button>
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
</script>
@endpush