<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::guard('admin')->user();  //untuk mengambil guard dari folder config/auth.php

        if (!$user || !in_array($user->roles, $roles)) {
            abort(403, 'Unauthorized.');
        } //jika ekse kusi $user tidak di temukan muncul 403|Unauthorized.

        return $next($request);
    }
}
