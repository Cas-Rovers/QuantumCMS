<?php

namespace App\Http\Middleware;

use App\Models\Admin\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin/*') || auth()->check()) {
            return $next($request);
        }

//        Visitor::create([
//            'ip_address' => $request->ip(),
//            'user_agent' => $request->userAgent(),
//            'visited_at' => Carbon::now(),
//        ]);

        return $next($request);
    }
}
