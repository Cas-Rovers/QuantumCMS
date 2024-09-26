<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\RedirectResponse;

    class LanguageController extends Controller
    {
        /**
         * Handle the locale change request.
         *
         * @param string $locale
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function language(string $locale): RedirectResponse
        {
            $supportedLocales = array_values(config('app.supported_locales'));

            if (! in_array($locale, $supportedLocales)) {
                $locale = 'en'; // Fallback to default
            }

            app()->setLocale($locale);
            session()->put('locale', $locale);

            if (auth()->check()) {
                auth()->user()->update(['locale' => $locale]);
            }

            return redirect()->back();
        }
    }
