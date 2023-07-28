<?php

namespace App\Helpers;

use App\Interfaces\ResetPasswordTokenInterface;
use App\Interfaces\VerifyEmailRepositoryInterface;
use App\Mail\ForgetPasswordMail;
use App\Mail\VerificationMail;
use App\Repositories\VerifyEmailRepository;
use Illuminate\Support\Facades\Mail;

Trait Mailer {
    protected $resetPasswordRepository;
    protected $verifyEmailRepository;

    public function __construct(ResetPasswordTokenInterface $resetPasswordRespository, VerifyEmailRepositoryInterface $verifyEmailRepository) {
        $this->resetPasswordRepository = $resetPasswordRespository;
        $this->verifyEmailRepository = $verifyEmailRepository;
    }

    /**
     * sendMail - send email
     *
     * @param string $mailView // ? string of the mail view
     * @param string $to
     * @return
     */
    public function sendMail($mailView, $to) {
        $resetPassword = $this->resetPasswordRepository->generate($to);

        $mail = new ForgetPasswordMail(
            $mailView,
            $resetPassword->token,
            $to
        );

        return Mail::to($to)->send($mail);
    }

    /**
     * sendVerificationLink - send a verification link
     *
     * @param string $to
     * @param boolean $api
     * @return
     */
    public function sendVerificationLink($to, $api = false) {
        $token = $this->verifyEmailRepository->generate($to);

        $mail = new VerificationMail($token, $to, $api);

        return Mail::to($to)->send($mail);
    }
}
