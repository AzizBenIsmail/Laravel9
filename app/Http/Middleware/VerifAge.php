<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $request->merge([
            'age' => trim($request->input('age')),
        ]);

        $age = (int)$request->input('age');

        if ($age < 18) {
            // Utilisation de la fonction abort() pour afficher un message d'erreur
            return abort(403, 'Vous devez avoir au moins 18 ans.');
        }
//        return abort(403,  "Vous devez avoir au moins 18 ans $age." );
        return $next($request);
    }


}
