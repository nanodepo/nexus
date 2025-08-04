<?php

namespace NanoDepo\Nexus\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class ThumbnailController
{
    public function __invoke(string $dir, string $method, string $size, string $file): BinaryFileResponse
    {
        abort_if(
            boolean: !in_array($size, config('nexus.allowed_sizes', [])),
            code: 403,
            message: 'Size Not Allowed'
        );

        $storage = Storage::disk('images');

        $realPath = "$dir/$file";
        $newDirPath = "$dir/$method/$size";
        $resultPath = "$newDirPath/$file";

        abort_if(
            boolean: !$storage->exists($realPath),
            code: 403,
            message: 'Image Not Found'
        );

        if (!$storage->exists($newDirPath)) {
            $storage->makeDirectory($newDirPath);
        }

        if (!$storage->exists($resultPath)) {
            $image = Image::read($storage->path($realPath));

            [$w, $h] = explode('x', $size);

            $image->cover($w, $h);
            $image->encode(new WebpEncoder(quality: 75));
            $image->save($storage->path($resultPath));
        }

        return response()->file($storage->path($resultPath));
    }
}

