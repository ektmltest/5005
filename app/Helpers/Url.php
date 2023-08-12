<?php

namespace App\Helpers;

trait Url {

    // ? preconditions:
    // ?    - url must have a locale when the locale is hide,
    // ?      the function will crash.
    // ?    - prefix must be 2 chars long
    protected function prepareLocalePrefix() {
        $prefix = request()->segment(1);

        if (strlen($prefix) != 2)
            return '';

        $isPrefixAr = ($prefix == 'ar');

        $localePrefix = (!$isPrefixAr ? $prefix . '/' : '');

        return $localePrefix;
    }

}
