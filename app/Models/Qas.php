<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type() {
        return $this->belongsTo(QasType::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function question(string $locale = null): Attribute {
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

    public function questionLocale(string $locale) {
        $this->locale = $locale;
        return $this->question;
    }

    public function answer(string $locale = null): Attribute {
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

    public function answerLocale(string $locale) {
        $this->locale = $locale;
        return $this->answer;
    }
}
