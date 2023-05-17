<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDepartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories() {
        return $this->hasMany(ProjectCategory::class);
    }
}
