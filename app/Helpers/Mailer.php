<?php

namespace App\Helpers;

use App\Interfaces\ResetPasswordTokenInterface;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;

Trait Mailer {
    public $resetPasswordRepository;

    public function __construct(ResetPasswordTokenInterface $resetPasswordRespository) {
        $this->resetPasswordRepository = $resetPasswordRespository;
    }


    public function sendMail($mailView, $to) {
        $resetPassword = $this->resetPasswordRepository->generate($to);

        $mail = new ForgetPasswordMail(
            $mailView,
            $resetPassword->token,
            $to
        );

        return Mail::to($to)->send($mail);
    }
}
