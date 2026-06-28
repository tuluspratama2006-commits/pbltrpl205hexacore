@extends('layouts.admin')
@section('title', 'Manual Book')

@section('content')

<style>
.manual-wrap {
    max-width: 900px;
    margin: 0 auto;
}
.manual-header {
    text-align: center;
    margin-bottom: 36px;
}
.manual-header h1 {
    font-size: 28px;
    font-weight: 800;
    color: #1a2340;
    margin-bottom: 6px;
}
.manual-header p {
    color: #6b7a99;
    font-size: 14px;
}
.manual-section {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e2eaf5;
    box-shadow: 0 2px 12px rgba(30,42,74,0.08);
    margin-bottom: 20px;
    overflow: hidden;
}
.manual-section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 18px 24px;
    background: #f5f8ff;
    border-bottom: 1px solid #e2eaf5;
    font-size: 16px;
    font-weight: 700;
    color: #1a2340;
    cursor: pointer;
    user-select: none;
}
.manual-section-title:hover {
    background: #eef4ff;
}
.manual-section-title .arrow {
    margin-left: auto;
    transition: transform 0.2s;
    color: #6b7a99;
}
.manual-section-title.open .arrow {
    transform: rotate(90deg);
}
.manual-section-body {
    padding: 20px 24px;
    display: none;
}
.manual-section-body.open {
    display: block;
}
.manual-section-body ol {
    padding-left: 20px;
    margin: 0;
}
.manual-section-body ol li {
    margin-bottom: 10px;
    font-size: 14px;
    color: #334155;
    line-height: 1.7;
}
.manual-section-body ol li strong {
    color: #1a2340;
}
.manual-section-body .note {
    background: #fffbeb;
    border-left: 4px solid #fbbf24;
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 13px;
    color: #92400e;
    margin-top: 12px;
}
.manual-section-body .tip {
    background: #f0f6ff;
    border-left: 4px solid #3a52a0;
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 13px;
    color: #1e3a5f;
    margin-top: 12px;
}
.manual-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #6b7a99;
    text-decoration: none;
    font-size: 13px;
    margin-bottom: 20px;
}
.manual-back:hover {
    color: #1a2340;
}
</style>

<a href="{{ route('admin.dashboard') }}" class="manual-back">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="15 18 9 12 15 6"/>
    </svg>
    Kembali ke Dashboard
</a>

<div class="manual-wrap">
    <div class="manual-header">
        <h1>📖 Manual Book Admin</h1>
        <p>Panduan lengkap menggunakan panel admin website PT. Berkah Alam Tabantang</p>
    </div>

    {{-- DASHBOARD --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
            </svg>
            Dashboard
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Statistik:</strong> Di halaman utama dashboard, kamu bisa lihat total pengunjung, total portofolio, total berita, dan total testimoni.</li>
                <li><strong>Grafik Pengunjung:</strong> Menampilkan grafik jumlah pengunjung website dalam 12 bulan terakhir.</li>
                <li><strong>Aktivitas Terbaru:</strong> Melihat log aktivitas admin terbaru (siapa melakukan apa).</li>
                <li><strong>Landing Page:</strong> Dari dashboard kamu bisa langsung mengubah Nama Perusahaan, Tagline, Deskripsi, dan Background Foto landing page.</li>
            </ol>
            <div class="tip">💡 Klik tombol "Lihat Landing Page" untuk preview hasil perubahan langsung di halaman publik.</div>
        </div>
    </div>

    {{-- TENTANG KAMI --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            Tentang Kami
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Deskripsi Perusahaan:</strong> Ubah teks deskripsi perusahaan yang tampil di halaman tentang kami.</li>
                <li><strong>Visi & Misi:</strong> Edit visi dan misi perusahaan.</li>
                <li><strong>Nomor Sertifikasi:</strong> Input nomor sertifikasi perusahaan.</li>
                <li><strong>Hero Image:</strong> Upload gambar utama halaman tentang kami.</li>
                <li><strong>Foto Grid:</strong> Upload kumpulan foto untuk ditampilkan di galeri.</li>
            </ol>
            <div class="tip">💡 Pastikan ukuran foto tidak terlalu besar agar website tetap cepat diakses.</div>
        </div>
    </div>

    {{-- PORTOFOLIO --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="2">
                <rect x="2" y="7" width="20" height="14" rx="2"/>
                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                <line x1="12" y1="12" x2="12" y2="16"/>
                <line x1="10" y1="14" x2="14" y2="14"/>
            </svg>
            Portofolio
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Menambah Portofolio:</strong> Klik tombol "Tambah" lalu isi form yang muncul (judul, deskripsi, kategori, foto).</li>
                <li><strong>Mengedit Portofolio:</strong> Klik ikon pensil pada portofolio yang ingin diubah.</li>
                <li><strong>Menghapus Portofolio:</strong> Klik ikon tong sampah, lalu konfirmasi penghapusan.</li>
                <li><strong>Filter Kategori:</strong> Gunakan dropdown filter untuk melihat portofolio berdasarkan kategori.</li>
            </ol>
        </div>
    </div>

    {{-- LAYANAN --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            Layanan
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Menambah Layanan:</strong> Klik "Tambah" lalu isi kode layanan, nama layanan, dan deskripsi.</li>
                <li><strong>Mengedit Layanan:</strong> Klik ikon pensil pada layanan yang ingin diubah.</li>
                <li><strong>Menghapus Layanan:</strong> Klik ikon tong sampah, lalu konfirmasi.</li>
            </ol>
            <div class="note">📌 Kode layanan bersifat unik, tidak boleh sama dengan layanan lain.</div>
        </div>
    </div>

    {{-- BERITA --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fb923c" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="8" y1="13" x2="16" y2="13"/>
                <line x1="8" y1="17" x2="16" y2="17"/>
                <line x1="8" y1="9" x2="10" y2="9"/>
            </svg>
            Berita
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Menambah Berita:</strong> Klik "Tambah", isi judul, konten (gunakan editor teks), pilih status (publish/draft), dan upload foto.</li>
                <li><strong>Mengedit Berita:</strong> Klik ikon pensil pada berita yang ingin diubah.</li>
                <li><strong>Menghapus Berita:</strong> Klik ikon tong sampah, lalu konfirmasi.</li>
                <li><strong>Filter Status:</strong> Gunakan dropdown untuk filter berita publish atau draft.</li>
            </ol>
            <div class="tip">💡 Berita dengan status "Draft" tidak akan tampil di halaman publik.</div>
        </div>
    </div>

    {{-- TESTIMONI --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                <line x1="9" y1="10" x2="15" y2="10"/>
                <line x1="9" y1="14" x2="13" y2="14"/>
            </svg>
            Testimoni
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Menambah Testimoni:</strong> Klik "Tambah", isi nama klien, pesan/testimoni, dan pilih rating bintang (1-5).</li>
                <li><strong>Mengedit Testimoni:</strong> Klik ikon pensil pada testimoni yang ingin diubah.</li>
                <li><strong>Menghapus Testimoni:</strong> Klik ikon tong sampah, lalu konfirmasi.</li>
            </ol>
        </div>
    </div>

    {{-- PENGATURAN --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f472b6" stroke-width="2">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
            Pengaturan
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Informasi Website:</strong> Ubah nama perusahaan, email, telepon, dan alamat.</li>
                <li><strong>Media Sosial:</strong> Input link WhatsApp, Instagram, Facebook, dan LinkedIn.</li>
                <li><strong>Google Maps:</strong> Tempel kode embed Google Maps untuk lokasi 1 dan 2.</li>
                <li><strong>Akun Admin:</strong> Ubah foto profil, nama, email, dan password admin.</li>
            </ol>
            <div class="tip">💡 Untuk Google Maps embed, buka Google Maps → klik "Bagikan" → pilih "Sematkan peta" → salin kode iframe.</div>
        </div>
    </div>

    {{-- NOTIFIKASI --}}
    <div class="manual-section">
        <div class="manual-section-title" onclick="toggleSection(this)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#e63946" stroke-width="2">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
            Notifikasi
            <span class="arrow">▶</span>
        </div>
        <div class="manual-section-body">
            <ol>
                <li><strong>Melihat Notifikasi:</strong> Klik ikon lonceng di pojok kanan atas untuk membuka panel notifikasi.</li>
                <li><strong>Menandai Dibaca:</strong> Klik notifikasi untuk menandainya sebagai sudah dibaca.</li>
                <li><strong>Baca Semua:</strong> Klik tombol "Baca" untuk menandai semua notifikasi sebagai dibaca.</li>
                <li><strong>Hapus Notifikasi:</strong> Klik tombol "Hapus" untuk menghapus semua notifikasi, atau klik × untuk menghapus satu notifikasi.</li>
            </ol>
            <div class="note">📌 Notifikasi akan muncul saat admin lain melakukan aktivitas di panel admin.</div>
        </div>
    </div>

</div>

<script>
function toggleSection(el) {
    el.classList.toggle('open');
    var body = el.nextElementSibling;
    if (body) {
        body.classList.toggle('open');
    }
}
</script>
@endsection
