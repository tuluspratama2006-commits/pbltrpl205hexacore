@extends('layouts.admin')

@section('title', 'Pengaturan')

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
<div class="page-header" style="margin-bottom: 28px;">
    <h1 class="page-heading" style="text-decoration: underline; text-underline-offset: 6px;"></h1>
</div>

<form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="pengaturan-grid">

    {{-- CARD WEBSITE --}}
    <div class="setting-card">
        <h5 class="setting-card-title">WEBSITE</h5>
        <div class="setting-card-body">

            {{-- Kolom Kiri --}}
            <div class="setting-col-left">
                <div class="setting-field">
                    <label class="setting-label">Nama :</label>
                    <input type="text" name="nama_perusahaan" class="setting-input"
                           value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}">
                </div>
                <div class="setting-field">
                    <label class="setting-label">Email :</label>
                    <input type="email" name="email" class="setting-input"
                           value="{{ old('email', $profil->email ?? '') }}">
                </div>
                <div class="setting-field">
                    <label class="setting-label">Telepon 1 :</label>
                    <input type="text" name="telepon" class="setting-input"
                           value="{{ old('telepon', $profil->telepon ?? '') }}">
                </div>
                <div class="setting-field">
                    <label class="setting-label">Telepon 2 :</label>
                    <input type="text" name="telepon_2" class="setting-input"
                           value="{{ old('telepon_2', $profil->telepon_2 ?? '') }}">
                </div>
                <div class="setting-field">
                    <label class="setting-label">Alamat 1 :</label>
                    <textarea name="alamat" class="setting-input setting-textarea" rows="3">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                </div>
                <div class="setting-field">
                    <label class="setting-label">Alamat 2 :</label>
                    <textarea name="alamat_2" class="setting-input setting-textarea" rows="3">{{ old('alamat_2', $profil->alamat_2 ?? '') }}</textarea>
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div class="setting-col-right">
                <div class="setting-subcard">
                    <label class="setting-sublabel">Media Sosial:</label>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                        </svg>
                        <input type="text" name="whatsapp" class="setting-input-sosmed"
                               placeholder="No WhatsApp"
                               value="{{ old('whatsapp', $profil->whatsapp ?? '') }}">
                    </div>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>
                        </svg>
                        <input type="text" name="instagram" class="setting-input-sosmed"
                               placeholder="Link Instagram"
                               value="{{ old('instagram', $profil->instagram ?? '') }}">
                    </div>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                        <input type="text" name="facebook" class="setting-input-sosmed"
                               placeholder="Link Facebook"
                               value="{{ old('facebook', $profil->facebook ?? '') }}">
                    </div>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                            <rect x="2" y="9" width="4" height="12"/>
                            <circle cx="4" cy="4" r="2"/>
                        </svg>
                        <input type="text" name="linkedin" class="setting-input-sosmed"
                               placeholder="Link LinkedIn"
                               value="{{ old('linkedin', $profil->linkedin ?? '') }}">
                    </div>
                </div>

                <div class="setting-subcard" style="margin-top: 12px;">
                    <label class="setting-sublabel">Lokasi (Google Maps Embed):</label>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        </svg>
                        <input type="text" name="maps_embed" class="setting-input-sosmed"
                               placeholder="Link Maps Lokasi 1"
                               value="{{ old('maps_embed', $profil->maps_embed ?? '') }}">
                    </div>
                    <div class="sosmed-item" style="margin-top:8px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        </svg>
                        <input type="text" name="maps_embed_2" class="setting-input-sosmed"
                               placeholder="Link Maps Lokasi 2"
                               value="{{ old('maps_embed_2', $profil->maps_embed_2 ?? '') }}">
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- CARD AKUN --}}
    <div class="setting-card">
        <h5 class="setting-card-title">AKUN</h5>

        <div class="akun-avatar-row">
    <div class="akun-avatar" style="{{ $user->foto ? 'background:none;padding:0;' : '' }}">
        @if(auth()->user()?->foto)
            <img src="{{ asset('storage/' . auth()->user()?->foto) }}"
                 style="width:48px;height:48px;border-radius:50%;object-fit:cover;">
        @else
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        @endif
    </div>
</div>

<div class="setting-field" style="margin-bottom:16px;">
    <label class="setting-label">Foto Profil :</label>
    <input type="file" name="foto" class="setting-input" accept="image/*">
    <small style="color:#94a3b8; font-size:11px;">Kosongkan jika tidak diganti</small>
</div>

        <div class="setting-field">
            <label class="setting-label">Nama :</label>
            <input type="text" name="akun_nama" class="setting-input"
                   value="{{ old('akun_nama', $user->nama_admin ?? '') }}">
        </div>
        <div class="setting-field">
            <label class="setting-label">Email :</label>
            <input type="email" name="akun_email" class="setting-input"
                   value="{{ old('akun_email', $user->email ?? '') }}">
        </div>
        <div class="setting-field">
            <label class="setting-label">Password baru :</label>
            <input type="password" name="password_baru" class="setting-input" placeholder="Kosongkan jika tidak diubah">
        </div>
        <div class="setting-field">
            <label class="setting-label">Konfirmasi Password :</label>
            <input type="password" name="konfirmasi_password" class="setting-input">
        </div>
    </div>

</div>

{{-- Tombol Update --}}
<div class="pengaturan-footer">
    <button type="submit" class="btn-update">Update Informasi</button>
</div>

</form>

@endsection

@push('scripts')
<script>
const toast = document.getElementById('toastNotif');
if (toast) {
    setTimeout(() => toast.remove(), 3500);
}
</script>
@endpush
