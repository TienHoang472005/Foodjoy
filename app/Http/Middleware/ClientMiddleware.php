<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Kiểm tra nếu không phải role 'user' thì không cho truy cập
        if (Auth::user()->role !== 'user') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        return $next($request);
    }
}
