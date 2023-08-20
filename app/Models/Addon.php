<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function readyProjects() {
        return $this->belongsToMany(Addon::class, 'ready_project_addons');
    }

    public function type() {
        return $this->belongsTo(AddonType::class, 'addon_type_id');
    }

    public function payments() {
        return $this->belongsToMany(Payment::class, 'payment_addons');
    }

    //////* attributes *//////
    public function name(string $locale = null): Attribute {
        return Attribute::make(
            get: function ($value) {
                if ($this->locale) {
                    $loc = $this->locale;
                    $this->locale = null;
                    return json_decode($value, true)[$loc];
                }
                return json_decode($value, true)[app()->getLocale()];
            },
            set: fn ($value) => json_encode($value)
        );
    }

    public function nameLocale(string $locale) {
        $this->locale = $locale;
        return $this->name;
    }

    public function getPriceAttribute() {
        return round($this->attributes['price'], 2);
    }
}
