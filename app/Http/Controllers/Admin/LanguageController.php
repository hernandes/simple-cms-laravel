<?php
namespace App\Http\Controllers\Admin;

use Lang;

class LanguageController extends Controller
{

    public function switchLang($lang)
    {
        if (!config('app.translatable')) {
            abort(404);
        }

        $previous = url()->previous();
        $request = app('request')->create($previous);
        $query = $request->query();
        $segments = $request->segments();

        if (!array_key_exists($lang, $segments) && isset($segments['1']) && !array_key_exists($segments[1], config('translatable.locales'))) {
            array_splice($segments, 1, 0, $lang);
        }

        if (array_key_exists($lang, config('translatable.locales'))) {
            if ($lang === config('app.fallback_locale')) {
                unset($segments[1]);
            } else {
                $segments[1] = $lang;
            }

            if (count($query)) {
                return redirect()->to(implode('/', $segments) . '?' . http_build_query($query));
            }

            return redirect()->to(implode('/', $segments));
        }

        return redirect()->back();
    }

}
