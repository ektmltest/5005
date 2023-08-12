<?php

namespace App\Helpers;

use App\Jobs\SendMailQueueJob;
use App\Mail\ForgetPasswordMail;
use App\Mail\VerificationMail;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\VerifyEmailRepository;
use Illuminate\Support\Facades\Mail;

Trait Mailer {

    /**
     * sendMail - send email
     *
     * @param string $mailView // ? string of the mail view
     * @param string $to
     * @return
     */
    public function sendMail($mailView, $to) {

        $resetPassword = (new ResetPasswordTokenRepository)->generate($to);

        $mail = new ForgetPasswordMail(
            $mailView,
            $resetPassword->token,
            $to
        );

        dispatch(new SendMailQueueJob($to, $mail));
        return true;

    }

    public function mail($mail_class, $data, $to, $mail_view=null) {

        // creating mail object e.g. \App\Mail\ExampleMail
        $mail = $mail_view ? new $mail_class($mail_view, $data) : new $mail_class($data);

        // create the job
        dispatch(new SendMailQueueJob($to, $mail));

        return true;

    }

    /**
     * sendVerificationLink - send a verification link
     *
     * @param string $to
     * @param boolean $api
     * @return
     */
    public function sendVerificationLink($to, $api = false) {

        $token = (new VerifyEmailRepository)->generate($to);

        $mail = new VerificationMail($token, $to, $api);

        dispatch(new SendMailQueueJob($to, $mail));
        return true;

    }
}
