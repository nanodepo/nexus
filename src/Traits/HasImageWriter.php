<?php

namespace NanoDepo\Nexus\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;

trait HasImageWriter
{
    /**
     * Save an uploaded image to the `images` disk as WebP.
     * @param UploadedFile $image uploaded image
     * @param string $dir uploaded file dir, default "other"
     * @param int $width width scale
     * @param int $height height scale
     * @param string|null $name file name
     * @return string
     */
    private function writeImage(
        UploadedFile $image,
        string $dir = 'other',
        int $width = 1000,
        int $height = 1000,
        ?string $name = null,
        bool $original = false
    ): string
    {
        $storage = Storage::disk('images');

        if (!$storage->exists($dir)) {
            $storage->makeDirectory($dir);
        }

        $filename = is_null($name)
            ? str(str()->uuid())->append('.webp')
            : str($name)->slug()->append('.webp');

        if ($original) {
            Image::read($image)
                ->save($storage->path("$dir/$filename"));
        } else {
            Image::read($image)
                ->scale($width, $height)
                ->save($storage->path("$dir/$filename"));
        }

        return $filename;
    }
}
