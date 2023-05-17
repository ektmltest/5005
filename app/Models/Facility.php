<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * * Facility class - الامتيازات او التسهيلات اللي ممكن تنضاف مع المشروع الجاهز
 * * Facility class - المعروض في صعحة الكاتالوج
 */
class Facility extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function readyProjects() {
        return $this->belongsToMany(ReadyProject::class, 'ready_project_facilities');
    }
}
