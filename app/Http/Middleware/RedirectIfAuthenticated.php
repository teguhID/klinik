<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->status == "Admin"){
                return redirect('loginAdmin');
            }
            else if(auth()->user()->status == "Dokter"){
                return redirect('loginDokter');
            }
            else if(auth()->user()->status == "Petugas"){
                return redirect('loginPetugas');
            }
            else{
                return 'asd';
            }
        }

        return $next($request);
    }
}
