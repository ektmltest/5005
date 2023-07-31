<?php
namespace App\Models;
use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReadyProject extends Model
{
    use HasFactory;

    protected $table ='ready_projects';

    protected $guarded = [];

    protected $with = ['user'];

    protected $appends = ['is_liked', 'average_rating'];

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

    public function likes() {
        return $this->hasMany(Like::class, 'likesable_id');
    }

    public function marketingCoupons() {
        return $this->hasMany(MarketingCoupon::class);
    }

    public function opinions() {
        return $this->hasMany(Opinion::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userRatings() {
        return $this->belongsToMany(User::class, 'ready_project_ratings')->withPivot(['rating', 'message', 'created_at']);
    }

    //////* my functions *//////
    public function liked() {
        return Like::where('user_id', auth()->user()->id)->where('likesable_id', $this->id)->first();
    }

    public function hasAddon($id) {
        return $this->addons()->where('addon_id', $id)->exists();
    }

    public function hasFacility($id) {
        return $this->facilities()->where('facility_id', $id)->exists();
    }

    public function hasTag($id) {
        return $this->tags()->where('tag_id', $id)->exists();
    }

    //////* attributes *//////
    // public function name(): Attribute {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true)[app()->getLocale()],
    //         set: fn ($value) => json_encode($value)
    //     );
    // }
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

    public function body(string $locale = null): Attribute {
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

    public function bodyLocale(string $locale) {
        $this->locale = $locale;
        return $this->body;
    }

    public function getIsLikedAttribute() {
        if (auth()->check())
            return !is_null($this->liked());
        else
            return null;
    }

    public function getAverageRatingAttribute() {
        $sum = 0;
        $num = 0;
        foreach ($this->userRatings as $ratingModel) {
            $sum += $ratingModel->pivot->rating;
            $num++;
        }

        $this->attributes['average_rating'] = $num ? $sum / $num : 0;
        return $this->attributes['average_rating'];
    }

    public function getImageAttribute() {
        return asset($this->attributes['image']);
    }

    public function getImageUriAttribute() {
        return $this->attributes['image'];
    }

    public function getPriceAttribute() {
        return round($this->attributes['price'], 2);
    }
}
