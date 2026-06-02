@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')

{{-- Header --}}
<div class="page-header" style="margin-bottom: 28px;">
    <h1 class="page-heading" style="text-decoration: underline; text-underline-offset: 6px;">PENGATURAN</h1>
</div>

<div class="pengaturan-grid">

    {{-- CARD WEBSITE --}}
    <div class="setting-card">
        <h5 class="setting-card-title">WEBSITE</h5>
        <div class="setting-card-body">

            {{-- Kolom Kiri --}}
            <div class="setting-col-left">
                <div class="setting-field">
                    <label class="setting-label">Nama :</label>
                    <input type="text" class="setting-input">
                </div>
                <div class="setting-field">
                    <label class="setting-label">Email :</label>
                    <input type="email" class="setting-input">
                </div>
                <div class="setting-field">
                    <label class="setting-label">Alamat :</label>
                    <textarea class="setting-input setting-textarea" rows="3"></textarea>
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div class="setting-col-right">
                <div class="setting-subcard">
                    <label class="setting-sublabel">Media Sosial:</label>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        </svg>
                        <input type="text" class="setting-input-sosmed" placeholder="">
                    </div>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        </svg>
                        <input type="text" class="setting-input-sosmed" placeholder="">
                    </div>
                </div>

                <div class="setting-subcard" style="margin-top: 12px;">
                    <label class="setting-sublabel">Lokasi:</label>
                    <div class="sosmed-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        </svg>
                        <input type="text" class="setting-input-sosmed" placeholder="">
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- CARD AKUN --}}
    <div class="setting-card">
        <h5 class="setting-card-title">AKUN</h5>

        <div class="akun-avatar-row">
            <div class="akun-avatar">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
        </div>

        <div class="setting-field">
            <label class="setting-label">Nama :</label>
            <input type="text" class="setting-input">
        </div>
        <div class="setting-field">
            <label class="setting-label">Email :</label>
            <input type="email" class="setting-input">
        </div>
        <div class="setting-field">
            <label class="setting-label">Password baru :</label>
            <input type="password" class="setting-input">
        </div>
        <div class="setting-field">
            <label class="setting-label">Konfirmasi Password :</label>
            <input type="password" class="setting-input">
        </div>
    </div>

</div>

{{-- Tombol Update --}}
<div class="pengaturan-footer">
    <button class="btn-update">Update Informasi</button>
</div>

@endsection