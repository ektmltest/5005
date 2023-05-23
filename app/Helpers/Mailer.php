<?php

namespace App\Helpers;

use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;

Trait Mailer {
    public function sendMail($mailView, $to) {
        return Mail::to($to)->send(new ForgetPasswordMail($mailView, $to));
    }
}
