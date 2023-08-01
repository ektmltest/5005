<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    static public function getOffers() {
        return static::query()->where('type', 'offers')->get();
    }

    static public function getOffer($key) {
        return static::query()->where('type', 'offers')
            ->where('key', $key)->first();
    }

    static public function getStoreOffer() {
        return static::query()->where('type', 'offers')
            ->where('key', 'store_offer')->first();
    }
}
