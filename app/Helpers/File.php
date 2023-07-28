<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait File
{
    /**
     * prepareFilePath - save the file and return its path
     *
     * @param mixed $file
     * @param mixed $dir
     * @param boolean $isLivewire // canceled
     * @param boolean $image
     * @return string
     */
    protected function prepareFilePath($file, $dir, $isLivewire = true, $image = false): string
    {
        $filename = time() . '-' . Str::random(16);

        if ($image || $this->isImageFile($file))
            return $this->convertImageToWebp($file, $dir, $filename);

        return ('assets/' . $file->storeAs("$dir/attachment", $filename . '.' . $file->getClientOriginalExtension(), 'file'));
    }

    /**
     * deleteUsingFilePath - delete a file using the given path
     *
     * @param string $filepath
     * @param string $root
     * @return void
     */
    protected function deleteUsingFilePath($filepath, $root = 'assets')
    {
        if (file_exists(public_path($filepath)))
            unlink(public_path($filepath));
    }

    /**
     * deleteFilesInFolder - delete files in folder recursively
     *
     * @param string $dir
     * @return void
     */
    protected function deleteFilesInFolder($dir)
    {
        $files = glob(public_path('assets/' . $dir . '/attachment/*'));
        foreach ($files as $file)
            unlink($file);
    }

    /**
     * convertImageToWebp - convert image to webp and save it
     * returns string of the path where the file is saved
     *
     * @param UploadedFile $file
     * @param string $dir
     * @param string $filename
     * @return string
     */
    protected function convertImageToWebp(UploadedFile $file, $dir, $filename): string
    {
        $contents = file_get_contents($file->path());

        $image = Image::make($contents);
        $image->encode('webp');

        $imagePath = "assets/$dir/attachment/$filename.webp";
        $image->save($imagePath);

        return $imagePath;
    }

    /**
     * isImageFile - check if the file passed is image or not
     *
     * @param UploadedFile $file
     * @return boolean
     */
    protected function isImageFile(UploadedFile $file): bool
    {
        $guessedExtension = $file->guessExtension();

        $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

        return in_array($guessedExtension, $allowedImageExtensions);
    }
}
