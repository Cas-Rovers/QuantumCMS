<?php

    namespace App\Http\Middleware\Admin;

    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response;

    class Localization
    {
        /**
         * Handle an incoming request.
         *
         * @param Closure(Request): (Response) $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            if (auth()->check()) {
                $locale = auth()->user()->locale;
                app()->setLocale($locale);
                session()->put('locale', $locale);
            }

            return $next($request);
        }
    }
