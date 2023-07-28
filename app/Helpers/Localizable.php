<?php

namespace App\Helpers;

trait Localizable {

    /**
     * setLocalization - check the lang request attribute and set
     * the localization based on its value.
     *
     * @return void
     */
    public function setLocalization() {
        if (request()->has('lang')) {
            app()->setLocale(request()->get('lang'));
        }
    }
}
