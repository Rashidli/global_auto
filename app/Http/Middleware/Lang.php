<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class Lang
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {

        $defaultLocale = config('app.locale');

        if (Session::has('lang')) {
            $locale = Session::get('lang');
        } else {
            $locale = $defaultLocale;
        }

        App::setLocale($locale);

        return $next($request);

    }
}
