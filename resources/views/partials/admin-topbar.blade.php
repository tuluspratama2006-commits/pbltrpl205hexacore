<div class="topbar">
    <div class="page-title">@yield('title', 'DASHBOARD')</div>
    <div class="topbar-right">
        <!-- Notification Bell -->
        <div class="notification-wrapper" style="position: relative;">
            <button class="action-btn" id="notificationBell" onclick="toggleNotifications()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
                <span class="badge" id="notificationBadge" style="display: none;">0</span>
            </button>

            <!-- Notification Dropdown -->
            <div class="notification-dropdown" id="notificationDropdown" style="display: none; position: absolute; top: 100%; right: 0; width: 360px; background: white; border-radius: 14px; box-shadow: 0 12px 40px rgba(17,24,39,0.12); z-index: 1000; max-height: 520px; overflow-y: auto; margin-top: 10px;">
                <div style="padding: 14px 16px; border-bottom: 1px solid #eef2ff; display: flex; align-items: center; justify-content: space-between;">
                    <div style="display:flex; flex-direction:column; gap:2px;">
                        <h4 style="margin:0; font-size:14px; font-weight:800; color:#0f172a;">Notifikasi</h4>
                        <div style="font-size:12px; color:#64748b;">Klik untuk tandai dibaca</div>
                    </div>
                    <div style="display:flex; gap:10px;">
                        <button type="button" onclick="markAllAsRead()" class="notif-action" style="border: 1px solid #dbeafe; background: #eff6ff; color:#1d4ed8; padding:7px 10px; border-radius: 10px; cursor:pointer; font-size:12px; font-weight:700; display:flex; align-items:center; gap:6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            Baca
                        </button>
                        <button type="button" onclick="deleteAllNotifications()" class="notif-action" style="border: 1px solid #fee2e2; background: #fff1f2; color:#e11d48; padding:7px 10px; border-radius: 10px; cursor:pointer; font-size:12px; font-weight:700; display:flex; align-items:center; gap:6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="3 6 5 6 21 6"/>
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                <path d="M10 11v6"/>
                                <path d="M14 11v6"/>
                                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                            </svg>
                            Hapus
                        </button>
                    </div>
                </div>
                <div id="notificationList">
                    <div style="padding: 20px; text-align: center; color: #6b7a99;">Memuat notifikasi...</div>
                </div>
            </div>
        </div>

        <!-- Bantuan -->
        <button class="action-btn" title="Bantuan">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
        </button>

        <!-- User Avatar -->
        <a class="user-avatar" href="{{ route('admin.pengaturan') }}" style="display:flex; align-items:center; text-decoration:none; color:inherit;" title="Ubah Profil">
            @php
                $admin = \Illuminate\Support\Facades\DB::table('admin')->first();
            @endphp

            @if(!empty($admin) && !empty($admin->foto))
                <img src="{{ asset('storage/' . $admin->foto) }}" alt="Profil" style="width:20px;height:20px;border-radius:50%;object-fit:cover;">
            @else
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            @endif
        </a>
    </div>
</div>

<script>
// Load notifications
function loadNotifications() {
    fetch('/admin/notifications')
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('notificationBadge');
            const list = document.getElementById('notificationList');

            // Update badge
            if (data.unreadCount > 0) {
                badge.style.display = 'flex';
                badge.textContent = data.unreadCount;
            } else {
                badge.style.display = 'none';
            }

            // Update list
            if (data.notifications.length === 0) {
                list.innerHTML = '<div style="padding: 20px; text-align: center; color: #6b7a99;">Tidak ada notifikasi</div>';
            } else {
                list.innerHTML = data.notifications.map(notif => `
                    <div style="padding: 12px 16px; border-bottom: 1px solid #f0f6ff; ${notif.is_read ? '' : 'background: #f0f6ff;'} cursor: pointer;" onclick="markAsRead(${notif.id})">
                        <div style="display: flex; justify-content: space-between; align-items: start;">
                            <div style="flex: 1;">
                                <div style="font-weight: 600; font-size: 13px; color: #1a2340;">${notif.admin_name} ${notif.aksi}</div>
                                ${notif.target ? `<div style="font-size: 12px; color: #6b7a99; margin-top: 4px;">${notif.target}</div>` : ''}
                                <div style="font-size: 11px; color: #94a3b8; margin-top: 4px;">${new Date(notif.created_at).toLocaleString('id-ID')}</div>
                            </div>
                            <button onclick="event.stopPropagation(); deleteNotification(${notif.id})" style="background: none; border: none; color: #e63946; cursor: pointer; font-size: 16px;">×</button>
                        </div>
                    </div>
                `).join('');
            }
        })
        .catch(err => console.error('Error loading notifications:', err));
}

// Toggle notification dropdown
function toggleNotifications() {
    const dropdown = document.getElementById('notificationDropdown');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    loadNotifications();
}

// Mark as read
function markAsRead(id) {
    fetch(`/admin/notifications/${id}/read`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => loadNotifications());
}

// Mark all as read
function markAllAsRead() {
    fetch('/admin/notifications/read-all', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => loadNotifications());
}

// Delete all notifications
function deleteAllNotifications() {
    if (!confirm('Hapus semua notifikasi?')) return;

    fetch('/admin/notifications', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(() => {
        // fallback: kalau backend belum punya route delete-all, minimal hapus tanda unread
        loadNotifications();
    })
    .catch(() => {
        // jika route delete-all ada nanti akan kita ganti
        alert('Gagal menghapus. (route delete-all belum tersedia)');
    });
}

// Delete notification
function deleteNotification(id) {
    if (confirm('Hapus notifikasi ini?')) {
        fetch(`/admin/notifications/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(() => loadNotifications());
    }
}

// Load notifications on page load
document.addEventListener('DOMContentLoaded', loadNotifications);

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const wrapper = document.querySelector('.notification-wrapper');
    const dropdown = document.getElementById('notificationDropdown');
    if (!wrapper.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});
</script>
