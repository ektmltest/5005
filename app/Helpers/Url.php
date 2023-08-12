<?php

namespace App\Helpers;

class Url {

    // ? preconditions:
    // ?    - url must have a locale when the locale is hide,
    // ?      the function will crash.
    // ?    - prefix must be 2 chars long
    public static function prepareLocalePrefix() {
        $prefix = request()->segment(1);

        if (strlen($prefix) != 2)
            return '';

        $isPrefixAr = ($prefix == 'ar');

        $localePrefix = (!$isPrefixAr ? $prefix . '/' : '');

        return $localePrefix;
    }

    public static function getUrl($uri) {
        return env('APP_URL') . '/' . $uri;
    }

}
