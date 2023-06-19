<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectReply extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'user',
        'project',
        'attachments'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function attachments() {
        return $this->hasMany(ProjectReplyAttachment::class);
    }
}
