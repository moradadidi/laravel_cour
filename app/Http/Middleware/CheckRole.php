<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $user = User::find($id);
        // dd($user->role);
        if ($user && $user->role === 'admin') {
            // dd('ok');
            return $next($request);
        }
    
        return redirect()->route('accueil');
    }
    
}
