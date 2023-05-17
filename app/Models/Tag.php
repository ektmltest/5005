<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function readyProjects() {
        return $this->belongsToMany(ReadyProject::class, 'ready_project_tags');
    }
}
