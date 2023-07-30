<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function getFileAttribute() {
        return asset($this->attributes['file']);
    }

    public function getFileUriAttribute() {
        return $this->attributes['file'];
    }

    public function getFilenameAttribute() {
        return explode('/', $this->file)[count(explode('/', $this->file)) - 1];
    }
}
