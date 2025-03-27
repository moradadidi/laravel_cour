<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeMiddleware
{
    /**
     * Vérifie que l'âge passé en query string est supérieur à 21.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $age = $request->query('age');

        if ($age && $age > 21) {
            return $next($request);
        }

        // Si l'âge n'est pas défini ou inférieur ou égal à 21, afficher une erreur 404
        abort(404);
    }
}
