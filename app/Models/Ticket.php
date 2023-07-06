<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['type', 'user', 'attachments'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }

    public function replies() {
        return $this->hasMany(TicketReply::class);
    }

    public function attachments() {
        return $this->hasMany(TicketAttachment::class);
    }
}
