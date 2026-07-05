@extends('layouts.admin')

@section('title', 'Tentang Kami')

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
<div class="page-header" style="margin-bottom: 24px;">
    <h1 class="page-heading"></h1>
</div>

<form action="{{ route('admin.tentang.update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div style="display:grid; grid-template-columns:1.2fr 1fr; gap:20px; margin-bottom:20px;">

    {{-- CARD INFORMASI PERUSAHAAN --}}
    <div class="setting-card">
        <h5 class="setting-card-title">INFORMASI PERUSAHAAN</h5>

        <div class="setting-field">
            <label class="setting-label">Nama Perusahaan :</label>
            <input type="text" name="nama_perusahaan" class="setting-input"
                   value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}">
        </div>

        <div class="setting-field">
            <label class="setting-label">Deskripsi :</label>
            <textarea name="deskripsi" class="setting-input setting-textarea" rows="4"
                      placeholder="Deskripsi perusahaan...">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
        </div>
        <div class="setting-field">
            <label class="setting-label">Visi :</label>
            <textarea name="visi" class="setting-input setting-textarea" rows="3"
                      placeholder="Visi perusahaan...">{{ old('visi', $profil->visi ?? '') }}</textarea>
        </div>
        <div class="setting-field">
            <label class="setting-label">Misi :</label>
            <textarea name="misi" class="setting-input setting-textarea" rows="3"
                      placeholder="Misi perusahaan...">{{ old('misi', $profil->misi ?? '') }}</textarea>
        </div>
        <div class="setting-field">
            <label class="setting-label">Nomor Sertifikasi (SBU) :</label>
            <input type="text" name="nomor_sertifikasi" class="setting-input"
                   value="{{ old('nomor_sertifikasi', $profil->nomor_sertifikasi ?? '') }}"
                   placeholder="PB-UMKU : ...">
        </div>
    </div>

    {{-- CARD HERO IMAGE & FOTO GRID --}}
    <div class="setting-card">
        <h5 class="setting-card-title">HERO IMAGE</h5>
        <p style="font-size:12px; color:#94a3b8; margin-bottom:12px;">Gambar watermark di belakang teks kiri</p>

        @if($profil && $profil->tentang_hero_image)
            <img src="{{ asset('storage/' . $profil->tentang_hero_image) }}"
                 style="width:100%; height:120px; object-fit:cover; border-radius:10px; margin-bottom:12px; opacity:0.7;">
        @else
            <div style="width:100%; height:120px; background:#e2e8f0; border-radius:10px; display:flex; align-items:center; justify-content:center; margin-bottom:12px;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                </svg>
            </div>
        @endif

        <div class="setting-field">
            <label class="setting-label">Upload Hero Image :</label>
            <input type="file" name="tentang_hero_image" class="setting-input" accept="image/*">
            <small style="color:#94a3b8; font-size:11px;">Kosongkan jika tidak diganti</small>
        </div>

        {{-- FOTO GRID --}}
        <h5 class="setting-card-title" style="margin-top:20px;">FOTO GRID</h5>
        <p style="font-size:12px; color:#94a3b8; margin-bottom:12px;">Foto terbaru otomatis tampil paling atas. Maks 5 foto.</p>

        @php $fotoGrid = json_decode($profil->foto_grid ?? '[]', true); @endphp

        {{-- Foto yang sudah ada --}}
        @if(!empty($fotoGrid))
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:8px; margin-bottom:14px;">
            @foreach($fotoGrid as $idx => $foto)
            <div style="position:relative;">
                <img src="{{ asset('storage/' . $foto) }}"
                     style="width:100%; height:80px; object-fit:cover; border-radius:8px;">
                <button type="submit"
                        name="hapus_foto"
                        value="{{ $idx }}"
                        onclick="return confirm('Yakin hapus foto ini?')"
                        style="position:absolute; top:4px; right:4px; background:rgba(220,38,38,0.85); border:none; border-radius:50%; width:24px; height:24px; cursor:pointer; display:flex; align-items:center; justify-content:center; color:white; font-size:14px; line-height:1;">
                    ×
                </button>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Upload foto baru --}}
        @if(count($fotoGrid) < 5)
        <div class="setting-field">
            <label class="setting-label">Upload Foto Baru :</label>
            <input type="file" name="foto_baru[]" class="setting-input" accept="image/*" multiple>
            <small style="color:#94a3b8; font-size:11px;">
                Slot tersisa: {{ 5 - count($fotoGrid) }} foto. Foto terbaru tampil paling atas.
            </small>
        </div>
        @else
        <div style="background:#fff4e5; padding:10px 14px; border-radius:8px; font-size:12px; color:#b36200;">
            Foto sudah penuh (5/5). Hapus foto lama untuk upload yang baru.
        </div>
        @endif

    </div>

</div>

{{-- Tombol Simpan --}}
<div class="pengaturan-footer">
    <button type="submit" class="btn-update">Simpan Perubahan</button>
</div>

</form>

@endsection

@push('scripts')
<script>
const toast = document.getElementById('toastNotif');
if (toast) setTimeout(() => toast.remove(), 3500);
</script>
@endpush