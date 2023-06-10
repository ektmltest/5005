<?php

namespace App\Helpers;

trait Localizable {
    public function setLocalization() {
        if (request()->has('lang')) {
            app()->setLocale(request()->get('lang'));
        }
    }
}
