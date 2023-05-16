<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class LocaleController.
 */
class LocaleController
{
    /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change(Request $request)
    {
        $locale = $request->get('lang');

        app()->setLocale($locale);

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
