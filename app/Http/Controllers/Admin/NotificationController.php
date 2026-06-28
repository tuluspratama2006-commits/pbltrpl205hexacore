<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;

class NotificationController extends Controller
{
    // Get all notifications
    public function index()
    {
        $notifications = AdminActivity::orderBy('created_at', 'desc')->limit(20)->get();
        $unreadCount = AdminActivity::where('is_read', false)->count();

        return response()->json([
            'notifications' => $notifications,
            'unreadCount' => $unreadCount,
        ]);
    }

    // Mark as read
    public function markAsRead($id)
    {
        $notification = AdminActivity::findOrFail($id);
        $notification->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    // Mark all as read
    public function markAllAsRead()
    {
        AdminActivity::where('is_read', false)->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    // Delete notification
    public function destroy($id)
    {
        $notification = AdminActivity::findOrFail($id);
        $notification->delete();

        return response()->json(['success' => true]);
    }

    // Helper untuk mencatat aktivitas
    public static function logActivity($adminName, $aksi, $target = null)
    {
        AdminActivity::create([
            'admin_name' => $adminName,
            'aksi' => $aksi,
            'target' => $target,
            'is_read' => false,
        ]);
    }
}
