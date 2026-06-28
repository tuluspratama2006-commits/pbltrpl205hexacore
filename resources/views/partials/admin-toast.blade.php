{{-- Toast Notification (global) --}}
@if(session('success'))
<div class="toast-notif" id="toastNotif">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="20 6 9 17 4 12"/>
    </svg>
    {{ session('success') }}
    <button onclick="document.getElementById('toastNotif')?.remove()" style="background:none;border:none;cursor:pointer;color:inherit;margin-left:8px;font-size:16px;">×</button>
</div>
@endif

@push('scripts')
@if(session('success'))
<script>
    window.addEventListener('load', () => {
        const toast = document.getElementById('toastNotif');
        if (toast) {
            toast.style.display = 'flex';
            toast.style.opacity = 1;
            setTimeout(() => toast.remove(), 3500);
        }
    });
</script>
@endif
@endpush

