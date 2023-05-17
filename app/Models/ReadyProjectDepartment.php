<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadyProjectDepartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function readyProjects() {
        return $this->hasMany(ReadyProject::class);
    }
}
