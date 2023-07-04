<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectReplyAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reply() {
        return $this->belongsTo(ProjectReply::class, 'project_reply_id');
    }

    public function getFileAttribute() {
        return asset($this->attributes['file']);
    }
}
