<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip tracking untuk admin
        if ($request->is('admin/*')) {
            return $next($request);
        }

        $visitorId = $request->cookie('visitor_id');
        if (empty($visitorId)) {
            $visitorId = bin2hex(random_bytes(16));
        }

        // Log kunjungan (distinct dihitung di dashboard)
        \App\Models\VisitorLog::create([
            'visitor_id' => $visitorId,
            'path' => $request->path(),
        ]);

        $response = $next($request);

        // Pastikan cookie terkirim agar log berikutnya konsisten untuk distinct
        return $response->cookie('visitor_id', $visitorId, 60 * 24 * 365);
    }
}
