<?php

namespace App\Helpers;

use Carbon\Carbon;

class Date {

    public static function formatDate($date, $format = 'D d, M, Y g:i A') {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
    }

}
