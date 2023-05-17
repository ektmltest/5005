<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function department() {
        return $this->belongsTo(ProjectDepartment::class, 'project_department_id');
    }
}
