<?php

namespace App\Http\Middleware;

use App\Models\VisitorLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Skip tracking untuk admin
        if ($request->is('admin/*')) {
            return $next($request);
        }

        // Skip request bukan halaman (asset, api, dll)
        if (!$request->isMethod('GET')) {
            return $next($request);
        }

        // Skip file asset
        $path = $request->path();
        $skipExtensions = ['css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'ico', 'woff', 'woff2', 'ttf', 'map'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if (in_array(strtolower($ext), $skipExtensions)) {
            return $next($request);
        }

        // Skip AJAX request
        if ($request->ajax()) {
            return $next($request);
        }

        // Ambil atau buat visitor_id dari cookie
        $visitorId = $request->cookie('visitor_id');
        if (empty($visitorId)) {
            $visitorId = bin2hex(random_bytes(16));
        }

        // Hanya catat 1x per visitor per hari
        $sudahAda = VisitorLog::where('visitor_id', $visitorId)
            ->whereDate('created_at', today())
            ->exists();

        if (!$sudahAda) {
            VisitorLog::create([
                'visitor_id' => $visitorId,
                'ip_address' => $request->ip(),
                'path'       => '/' . $path,
            ]);
        }

        $response = $next($request);

        return $response->cookie('visitor_id', $visitorId, 60 * 24 * 365);
    }
}