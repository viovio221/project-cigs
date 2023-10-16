<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert

class CheckUserRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'organizer') {
                return $next($request);
            } elseif ($user->role == 'member') {
                $allowedRoutes = ['dashboard', 'event', 'membersdata', 'news', 'review', 'message', 'comment_posts'];
                $currentRoute = $request->route()->getName();

                if (in_array($currentRoute, $allowedRoutes)) {
                    return $next($request);
                } else {
                    Alert::error('Access Denied', 'You do not have permission to access this page.');
                    return redirect()->route('dashboard');
                }
            } elseif ($user->role == 'non-member') {
                if ($request->route()->getName() == 'dashboard' || $request->route()->getName() == 'membersdata') {
                    return $next($request);
                } else {
                    Alert::error('Access Denied', 'You do not have permission to access this page.');
                    return redirect()->route('dashboard');
                }
            }
        }

        return redirect()->route('dashboard');  
    }
}
