<?php

namespace App\Repositories\Settings;

use App\Models\Settings\SocialMedia;

class SocialMediaRepository {

    public function getAll() {
        return SocialMedia::all();
    }

}
