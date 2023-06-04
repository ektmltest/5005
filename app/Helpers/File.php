<?php

namespace App\Helpers;
use Illuminate\Support\Str;

trait File {
    protected function prepareFilePath($file, $dir, $isLivewire) {
        $random = Str::random(16);

        if ($isLivewire)
            return ('assets/' . $file->storeAs("$dir/attachment", $random . '.' . $file->getClientOriginalExtension(), 'file'));
        else {
            // TODO: here to upload when using api
            ;
        }
    }
}
