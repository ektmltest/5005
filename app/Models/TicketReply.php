<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'attachments',
        'user'
    ];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function attachments() {
        return $this->hasMany(TicketReplyAttachment::class);
    }
}
