<?php

namespace NanoDepo\Nexus\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;

trait HasImageWriter
{
    /**
     * A function that displays a notification in the lower right corner of the screen.
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
        int $width = 950,
        int $height = 950,
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
                ->encode(new WebpEncoder(quality: 75))
                ->save($storage->path("$dir/$filename"));
        } else {
            $photo = Image::read($image)->scale($width, $height);

            Image::create(1000, 1000)
                ->fill('eeeeee')
                ->place($photo, 'center')
                ->encode(new WebpEncoder(quality: 75))
                ->save($storage->path("$dir/$filename"));
        }

        return $filename;
    }
}
