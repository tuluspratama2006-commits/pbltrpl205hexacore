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
            <div class="notification-dropdown" id="notificationDropdown" style="display: none; position: absolute; top: 100%; right: 0; width: 350px; background: white; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); z-index: 1000; max-height: 500px; overflow-y: auto; margin-top: 10px;">
                <div style="padding: 16px; border-bottom: 1px solid #e2eaf5; display: flex; justify-content: space-between; align-items: center;">
                    <h4 style="margin: 0; font-size: 16px; font-weight: 700; color: #1a2340;">Notifikasi</h4>
                    <button onclick="markAllAsRead()" style="background: none; border: none; color: #3a52a0; cursor: pointer; font-size: 12px; font-weight: 600;">Tandai Semua Dibaca</button>
                </div>
                <div id="notificationList">
                    <div style="padding: 20px; text-align: center; color: #6b7a99;">Memuat notifikasi...</div>
                </div>
            </div>
        </div>
        
        <!-- User Avatar -->
        <div class="user-avatar">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </div>
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