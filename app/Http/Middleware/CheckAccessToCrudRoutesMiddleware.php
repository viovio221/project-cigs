<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckAccessToCrudRoutesMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role != 'admin' && $user->role != 'member') {
                Alert::error('Access Denied', 'You do not have permission to access this page.');
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
