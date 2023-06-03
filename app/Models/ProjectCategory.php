<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function projects() {
        return $this->belongsToMany(Project::class, 'projects');
    }

    public function department() {
        return $this->belongsTo(ProjectDepartment::class, 'project_department_id');
    }

    //////* attributes *//////
    public function name(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true)[app()->getLocale()],
            set: fn ($value) => json_encode($value)
        );
    }
}
