<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'rank_permissions');
    }

    public function type() {
        return $this->belongsTo(RankType::class, 'rank_type_id');
    }
}
