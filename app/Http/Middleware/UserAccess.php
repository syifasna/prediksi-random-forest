<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$userRoles): Response
    {
        if (in_array(auth()->user()->role, $userRoles)) {
            return $next($request);
        }

        return response()->view('error', [
            'message' => 'Kamu tidak memiliki akses untuk halaman ini.'
        ], 403);
    }
}
