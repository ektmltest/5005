<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function readyProject() {
        return $this->belongsTo(ReadyProject::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
