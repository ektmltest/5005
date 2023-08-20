<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\Mailer;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Mailer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avatar'];

    // ranks relationship
    public function rank() {
        return $this->belongsTo(Rank::class);
    }

    //
    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function projectReplies() {
        return $this->hasMany(ProjectReply::class);
    }

    public function readyProjectOpinions() {
        return $this->hasMany(Opinion::class);
    }

    public function marketingCoupons() {
        return $this->hasMany(MarketingCoupon::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function marketingLevels() {
        return $this->belongsToMany(MarketingLevel::class, 'user_marketing_levels');
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function ticketReplies() {
        return $this->hasMany(TicketReply::class);
    }

    public function galleryProjects() {
        return $this->hasMany(GalleryProject::class);
    }

    public function galleryTypes() {
        return $this->hasMany(GalleryProjectType::class);
    }

    public function newspapers() {
        return $this->hasMany(Newspaper::class);
    }

    public function readyProjects() {
        return $this->hasMany(ReadyProject::class);
    }

    public function readyProjectRatings() {
        return $this->belongsToMany(ReadyProject::class, 'ready_project_ratings');
    }

    public function bankCards() {
        return $this->hasMany(UserBankCard::class);
    }

    public function withdrawals() {
        return Withdrawal::query()->whereIn('user_bank_card_id', $this->bankCards()->select('id')->get()->pluck('id'));
    }

    public function permissions() {
        return $this->rank->permissions();
    }

    public function hasPermission($permission) {
        return $this->rank->hasPermission($permission);
    }

    public function hasAnyPermission() {
        return $this->rank->permissions()->count() > 0;
    }

    //////* functions *///////
    public function verified() {
        return !is_null($this->email_verified_at);
    }

    public function sendVerificationMail() {
        return $this->sendVerificationLink($this->email);
    }

    public function incrementVisits($amount = 1) {
        $this->visits += $amount;
        return $this->visits;
    }

    //////* Attributes *//////
    public function getFullNameAttribute() {
        return $this->fname . ' ' . $this->lname;
    }

    public function getAvatarAttribute() {
        if (isset($this->attributes['avatar']))
            return asset($this->attributes['avatar']);
        else
            return null;
    }

    public function getAvatarUriAttribute() {
        if (isset($this->attributes['avatar']))
            return $this->attributes['avatar'];
        else
            return null;
    }

    public function getBalanceAttribute() {
        return round($this->attributes['balance'], 2);
    }

    public function setBalanceAttribute($balance) {
        $this->attributes['balance'] = round($balance, 2);
    }
}
