<?php

namespace App\Models;

use App\Helpers\Mailer;
use App\Mail\SubscriberNewPostMail;
use App\Mail\SubscriberWelcomeMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, Mailer;

    protected $guarded = [];

    public function sendWelcomeMail() {
        return $this->mail(
            SubscriberWelcomeMail::class,
            ['email' => $this->email],
            $this->email
        );
    }

    public function sendNewPostMail($post_data) {
        return $this->mail(
            SubscriberNewPostMail::class,
            $post_data,
            $this->email
        );
    }

    public function sendMail($mail_class, $data) {
        return $this->mail($mail_class, $data, $this->email);
    }
}
