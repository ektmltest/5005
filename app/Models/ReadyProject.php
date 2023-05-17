<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadyProject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department() {
        return $this->belongsTo(ReadyProjectDepartment::class, 'ready_project_department_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'ready_project_tags');
    }

    public function facilities() {
        return $this->belongsToMany(Facility::class, 'ready_project_facilities');
    }

    public function addons() {
        return $this->belongsToMany(Addon::class, 'ready_project_addons');
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function marketingCoupons() {
        return $this->hasMany(MarketingCoupon::class);
    }

    public function opinions() {
        return $this->hasMany(Opinion::class);
    }

    //////* attributes *//////
    public function name(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }

    public function description(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }

    public function body(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }
}
