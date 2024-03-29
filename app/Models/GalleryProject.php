<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryProject extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['type'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(GalleryProjectType::class, 'gallery_type_id');
    }

    //////* attributes *//////
    public function description(string $locale = null): Attribute {
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

    public function descriptionLocale(string $locale) {
        $this->locale = $locale;
        return $this->description;
    }

    public function getImageAttribute() {
        return asset($this->attributes['image']);
    }

    public function getImageUriAttribute() {
        return $this->attributes['image'];
    }
}
