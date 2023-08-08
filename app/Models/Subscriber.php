<?php

namespace App\Models;

use App\Helpers\Mailer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, Mailer;

    protected $guarded = [];

    public function sendMail($mail_class, $data) {
        return $this->mail($mail_class, $data, $this->email);
    }
}
