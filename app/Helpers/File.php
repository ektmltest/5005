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

    protected function deleteUsingFilePath($filepath, $root = 'assets') {
        if (file_exists(public_path($filepath)))
            unlink(public_path($filepath));
    }

    protected function deleteFilesInFolder($dir) {
        $files = glob(public_path('assets/' . $dir . '/attachment/*'));
        foreach ($files as $file)
            unlink($file);
    }
}
