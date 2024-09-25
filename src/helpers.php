<?php

use Illuminate\Support\Facades\File;
use NanoDepo\GemsUI\Alert\Flash;

if (!function_exists('alert')) {
    /**
     * The helper helps to receive and send flash messages.
     *
     * @return Flash
     */
    function alert(): Flash
    {
        return app(Flash::class);
    }
}

if (!function_exists('thumbnail')) {
    /**
     * Generate a thumbnail URL for a given item.
     *
     * @param null|iterable|string $item The item to generate thumbnail for. Can be null, iterable or string.
     * @param string $size The desired size of the thumbnail. Default is '500x500'.
     * @param string $dir The directory of the item. Default is 'other'.
     *
     * @return null|iterable|string The generated thumbnail URL. It could be null, iterable or string, depending on the type of $item.
     */
    function thumbnail(
        null|iterable|string $item,
        string $size = '500x500',
        string $dir = 'other'
    ): null|iterable|string
    {
        if (is_iterable($item)) {
            $arr = [];
            foreach ($item as $image) {
                $arr[] = route('thumbnail', [
                    'size' => $size,
                    'dir' => $dir,
                    'method' => 'resize',
                    'file' => File::basename($image)
                ]);
            }
            return $arr;
        } elseif (is_string($item)) {
            return route('thumbnail', [
                'size' => $size,
                'dir' => $dir,
                'method' => 'resize',
                'file' => File::basename($item)
            ]);
        }
        return null;
    }
}

if (!function_exists('lerp')) {
    /**
     * Performs linear interpolation between two values.
     *
     * @param int|float $a The starting value.
     * @param int|float $b The ending value.
     * @param float $divider The interpolation factor, must be between 0 and 1.
     *
     * @return int|float The interpolated value between $a and $b.
     *
     * @throws InvalidArgumentException If $divider is not within the range of 0 to 1.
     */
    function lerp(int|float $a, int|float $b, float $divider): int|float
    {
        if ($divider < 0 || $divider > 1) {
            throw new InvalidArgumentException('Divider must be in range of 0 to 1');
        }

        return $a + $divider * ($b - $a);
    }
}
