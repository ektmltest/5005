<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryProject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(GalleryProjectType::class, 'gallery_type_id');
    }

    //////* attributes *//////
    public function description(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true)[app()->getLocale()],
            set: fn ($value) => json_encode($value)
        );
    }
}
