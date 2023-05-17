<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function state() {
        return $this->belongsTo(ProjectState::class, 'project_state_id');
    }

    public function attachments() {
        return $this->hasMany(ProjectAttachment::class);
    }

    public function replies() {
        return $this->hasMany(ProjectReply::class);
    }
}
