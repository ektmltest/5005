<?php
namespace App\Models;

use App\Helpers\Mailer;
use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Contact extends Model
{
    use HasFactory, Mailer;

    protected $guarded = [];

    public function sendMail() {
        $this->mail(
            ContactMail::class,
            $this->toArray(),
            env('CONTACT_MAIL_ADDRESS', 'info@ektml.com')
        );
    }
}
