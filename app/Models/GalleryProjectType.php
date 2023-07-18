<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryProjectType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function galleryProjects() {
        return $this->hasMany(GalleryProject::class, 'gallery_type_id');
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
}
