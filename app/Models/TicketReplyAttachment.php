<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReplyAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reply() {
        return $this->belongsTo(TicketReply::class, 'ticket_reply_id');
    }

    public function getFileAttribute() {
        return asset($this->attributes['file']);
    }
}
