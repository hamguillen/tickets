<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        
        /*if (Auth::guard($guards)->check()) {
            $role = Auth::user()->tipo;
            switch ($role) {
              case 'users':
                 return redirect('/');
                 break;
              case 'clients':
                 return redirect('/tickets');
                 break; 
              default:
                 return redirect('/'); 
                 break;
            }
          }
        */
        //return redirect(RouteServiceProvider::CLIENT);
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
