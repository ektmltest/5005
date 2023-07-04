<?php
namespace App\Models;
use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReadyProject extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(User::class, 'ready_project_ratings')->withPivot('rating');
    }

    //////* my functions *//////
    public function liked() {
        return Like::where('user_id', auth()->user()->id)->where('likesable_id', $this->id)->first();
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

    public function description(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true)[app()->getLocale()],
            set: fn ($value) => json_encode($value)
        );
    }

    public function body(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true)[app()->getLocale()],
            set: fn ($value) => json_encode($value)
        );
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

        return $sum / $num;
    }

    public function getImageAttribute() {
        return asset($this->attributes['image']);
    }
}
