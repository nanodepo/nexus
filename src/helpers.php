<?php

use Illuminate\Support\Facades\File;
use NanoDepo\Nexus\Alert\Flash;
use NanoDepo\Nexus\ValueObjects\Price;

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
     * @param null|string $size The desired size of the thumbnail. Default is '500x500'.
     * @param null|string $dir The directory of the item. Default is 'other'.
     *
     * @return null|iterable|string The generated thumbnail URL. It could be null, iterable or string, depending on the type of $item.
     */
    function thumbnail(
        null|iterable|string $item,
        ?string $size = null,
        ?string $dir = null
    ): null|iterable|string
    {
        $params = [
            'size' => $size ?? config('nexus.default_size'),
            'dir' => $dir ?? config('nexus.default_folder'),
            'method' => 'resize',
        ];

        if (is_iterable($item)) {
            $arr = [];
            foreach ($item as $image) {
                $arr[] = route('thumbnail', [...$params, 'file' => File::basename($image)]);
            }
            return $arr;
        } elseif (is_string($item)) {
            return route('thumbnail', [...$params, 'file' => File::basename($item)]);
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

if (!function_exists('hexToRgb')) {
    /**
     * Converts a hexadecimal color code to its RGB representation.
     *
     * @param string $hex The hexadecimal color code, with or without a leading '#'.
     *
     * @return array An array containing the RGB values as integers: [red, green, blue].
     */
    function hexToRgb(string $hex): array
    {
        $hex = str_replace('#', '', $hex);
        $bigint = hexdec($hex);
        $r = ($bigint >> 16) & 255;
        $g = ($bigint >> 8) & 255;
        $b = $bigint & 255;
        return [$r, $g, $b];
    }
}

if (!function_exists('rgbToHex')) {
    /**
     * Converts RGB color values to HSL (Hue, Saturation, Lightness).
     *
     * @param float|int $r The red color value, ranged from 0 to 255.
     * @param float|int $g The green color value, ranged from 0 to 255.
     * @param float|int $b The blue color value, ranged from 0 to 255.
     *
     * @return array An array containing the HSL values:
     *               - float $h: The hue in degrees (0 to 360).
     *               - float $s: The saturation percentage (0 to 100).
     *               - float $l: The lightness percentage (0 to 100).
     */
    function rgbToHsl(float|int $r, float|int $g, float|int $b): array
    {
        $r /= 255;
        $g /= 255;
        $b /= 255;
        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $l = ($max + $min) / 2;

        if ($max == $min) {
            $h = $s = 0; // achromatic
        } else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
            switch ($max) {
                case $r:
                    $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                    break;
                case $g:
                    $h = ($b - $r) / $d + 2;
                    break;
                case $b:
                    $h = ($r - $g) / $d + 4;
                    break;
            }
            $h *= 60;
        }

        return [$h, $s * 100, $l * 100];
    }
}

if (!function_exists('hslToRgb')) {
    /**
     * Converts HSL (Hue, Saturation, Lightness) color representation to RGB (Red, Green, Blue).
     *
     * @param float|int $h The hue value, in degrees (0-360).
     * @param float|int $s The saturation value, as a percentage (0-100).
     * @param float|int $l The lightness value, as a percentage (0-100).
     *
     * @return array An array containing the RGB values as integers, with each component in the range 0-255.
     */
    function hslToRgb(float|int $h, float|int $s, float|int $l): array
    {
        $s /= 100;
        $l /= 100;
        $c = (1 - abs(2 * $l - 1)) * $s;
        $x = $c * (1 - abs(fmod($h / 60, 2) - 1));
        $m = $l - $c / 2;
        $r = 0;
        $g = 0;
        $b = 0;

        if ($h >= 0 && $h < 60) {
            $r = $c;
            $g = $x;
            $b = 0;
        } elseif ($h >= 60 && $h < 120) {
            $r = $x;
            $g = $c;
            $b = 0;
        } elseif ($h >= 120 && $h < 180) {
            $r = 0;
            $g = $c;
            $b = $x;
        } elseif ($h >= 180 && $h < 240) {
            $r = 0;
            $g = $x;
            $b = $c;
        } elseif ($h >= 240 && $h < 300) {
            $r = $x;
            $g = 0;
            $b = $c;
        } elseif ($h >= 300 && $h < 360) {
            $r = $c;
            $g = 0;
            $b = $x;
        }

        $r = round(($r + $m) * 255);
        $g = round(($g + $m) * 255);
        $b = round(($b + $m) * 255);
        return [$r, $g, $b];
    }
}

if (!function_exists('rgbToHex')) {
    /**
     * Converts RGB color values to a hexadecimal color string.
     *
     * @param int $r The red component of the color (0-255).
     * @param int $g The green component of the color (0-255).
     * @param int $b The blue component of the color (0-255).
     *
     * @return string The hexadecimal color string in the format "#rrggbb".
     */
    function rgbToHex(int $r, int $g, int $b): string
    {
        $toHex = function ($value) {
            $hex = dechex($value);
            return strlen($hex) === 1 ? '0' . $hex : $hex;
        };
        return '#' . $toHex($r) . $toHex($g) . $toHex($b);
    }
}

if (!function_exists('getAnalogousColors')) {
    /**
     * Computes the triadic colors based on the given hue.
     *
     * @param float|int $h The hue value in degrees (0 to 360).
     *
     * @return array Returns an associative array containing:
     * - 'primary': The primary color hue (input value).
     * - 'secondary': The secondary color hue (input value + 120°).
     * - 'tertiary': The tertiary color hue (input value + 240°).
     */
    function getAnalogousColors(float|int $h): array
    {
        return [
            'primary' => $h, // Основной цвет
            'secondary' => fmod($h - 10 + 360, 360), // Второй цвет триады (+120°)
            'tertiary' => fmod($h + 30, 360), // Третий цвет триады (+240°)
        ];
    }
}

if (!function_exists('getTriadicColors')) {
    /**
     * Computes the triadic colors based on the given hue.
     *
     * @param float|int $h The hue value in degrees (0 to 360).
     *
     * @return array Returns an associative array containing:
     * - 'primary': The primary color hue (input value).
     * - 'secondary': The secondary color hue (input value + 120°).
     * - 'tertiary': The tertiary color hue (input value + 240°).
     */
    function getTriadicColors(float|int $h): array
    {
        return [
            'primary' => $h, // Основной цвет
            'secondary' => fmod($h + 120, 360), // Второй цвет триады (+120°)
            'tertiary' => fmod($h + 240, 360), // Третий цвет триады (+240°)
        ];
    }
}

if (!function_exists('getSplitComplementaryColors')) {
    /**
     * Calculates the split complementary colors based on the given hue.
     *
     * @param float|int $h The hue value in degrees (0 to 360).
     *
     * @return array Returns an associative array containing:
     * - 'primary': The primary color hue (input value).
     * - 'secondary': The secondary color hue (30° clockwise from the complementary color).
     * - 'tertiary': The tertiary color hue (30° counterclockwise from the complementary color).
     */
    function getSplitComplementaryColors(float|int $h): array
    {
        // Вычисляем hue для комплементарного цвета (напротив на цветовом круге)
        $complementaryHue = fmod($h + 180, 360);

        // Вычисляем hue для двух цветов, отстоящих на 30 градусов от комплементарного
        return [
            'primary' => $h, // Основной цвет
            'secondary' => fmod($complementaryHue + 25, 360),
            'tertiary' => fmod($complementaryHue - 25 + 360, 360),
        ];
    }
}

if (!function_exists('generateTheme')) {
    /**
     * Generates a theme's color palette based on a primary hex color.
     *
     * @param string $primaryHex The primary color in hexadecimal format.
     *
     * @return stdClass An object containing 'light' and 'dark' theme color palettes,
     *                  each of which has a structured set of colors for UI elements.
     */
    function generateTheme(string $primaryHex): stdClass
    {
        // Переводим HEX в RGB
        list($r, $g, $b) = hexToRgb($primaryHex);

        // Переводим RGB в HSL
        list($h, $s, $l) = rgbToHsl($r, $g, $b);

        // Определяем дополнительные оттенки
        $hues = [
            ...match (config('nexus.scheme')) {
                'analogous' => getAnalogousColors($h),
                'triadic' => getTriadicColors($h),
                default => getSplitComplementaryColors($h),
            },
            'red' => 0, // Красный для destructive
            'gray' => $h // Для серых используем тот же оттенок, но с низкой насыщенностью
        ];

        // Определяем палитру в зависимости от темы и возвращаем
        return literal(
            light: literal(
                // main
                gray: rgbToHex(...hslToRgb($hues['gray'], 5, 50)),
                primary: rgbToHex(...hslToRgb($hues['primary'], 45, 40)),
                primary_container: rgbToHex(...hslToRgb($hues['primary'], 30, 80)),
                secondary: rgbToHex(...hslToRgb($hues['secondary'], 45, 40)),
                secondary_container: rgbToHex(...hslToRgb($hues['secondary'], 30, 80)),
                tertiary: rgbToHex(...hslToRgb($hues['tertiary'], 45, 40)),
                tertiary_container: rgbToHex(...hslToRgb($hues['tertiary'], 30, 80)),
                destructive: rgbToHex(...hslToRgb($hues['red'], 45, 40)),
                destructive_container: rgbToHex(...hslToRgb($hues['red'], 30, 80)),

                // backgrounds
                background: rgbToHex(...hslToRgb($hues['gray'], 8, 90)),
                front: rgbToHex(...hslToRgb($hues['gray'], 8, 93)),
                surface: rgbToHex(...hslToRgb($hues['gray'], 8, 96)),
                section: rgbToHex(...hslToRgb($hues['gray'], 8, 99)),
                foreground: rgbToHex(...hslToRgb($hues['gray'], 10, 15)),

                // text
                text: rgbToHex(...hslToRgb($hues['gray'], 10, 10)),
                section_text: rgbToHex(...hslToRgb($hues['gray'], 10, 15)),
                primary_text: rgbToHex(...hslToRgb($hues['primary'], 30, 96)),
                primary_container_text: rgbToHex(...hslToRgb($hues['primary'], 40, 15)),
                secondary_text: rgbToHex(...hslToRgb($hues['secondary'], 30, 96)),
                secondary_container_text: rgbToHex(...hslToRgb($hues['secondary'], 40, 15)),
                tertiary_text: rgbToHex(...hslToRgb($hues['tertiary'], 30, 96)),
                tertiary_container_text: rgbToHex(...hslToRgb($hues['tertiary'], 40, 15)),
                destructive_text: rgbToHex(...hslToRgb($hues['red'], 30, 96)),
                destructive_container_text: rgbToHex(...hslToRgb($hues['red'], 40, 15)),
                subtitle: rgbToHex(...hslToRgb($hues['gray'], 10, 40)),
                hint: rgbToHex(...hslToRgb($hues['gray'], 10, 55)),
                outline: rgbToHex(...hslToRgb($hues['gray'], 10, 75)),
                backline: rgbToHex(...hslToRgb($hues['gray'], 8, 85)),

                // controls
                accent: rgbToHex(...hslToRgb($hues['primary'], 50, 40)),
                link: rgbToHex(...hslToRgb($hues['primary'], 60, 40)),
                focus: rgbToHex(...hslToRgb($hues['primary'], 30, 80)),

                // section
                section_header: rgbToHex(...hslToRgb($hues['primary'], 30, 50)),
                section_separator: rgbToHex(...hslToRgb($hues['gray'], 10, 90)),
            ),
            dark: literal(
                // main
                gray: rgbToHex(...hslToRgb($hues['gray'], 5, 50)),
                primary: rgbToHex(...hslToRgb($hues['primary'], 45, 60)),
                primary_container: rgbToHex(...hslToRgb($hues['primary'], 30, 20)),
                secondary: rgbToHex(...hslToRgb($hues['secondary'], 45, 60)),
                secondary_container: rgbToHex(...hslToRgb($hues['secondary'], 30, 20)),
                tertiary: rgbToHex(...hslToRgb($hues['tertiary'], 45, 60)),
                tertiary_container: rgbToHex(...hslToRgb($hues['tertiary'], 30, 20)),
                destructive: rgbToHex(...hslToRgb($hues['red'], 45, 60)),
                destructive_container: rgbToHex(...hslToRgb($hues['red'], 30, 20)),

                // backgrounds
                background: rgbToHex(...hslToRgb($hues['gray'], 8, 1)),
                front: rgbToHex(...hslToRgb($hues['gray'], 8, 4)),
                surface: rgbToHex(...hslToRgb($hues['gray'], 8, 7)),
                section: rgbToHex(...hslToRgb($hues['gray'], 8, 10)),
                foreground: rgbToHex(...hslToRgb($hues['gray'], 10, 90)),

                // text
                text: rgbToHex(...hslToRgb($hues['gray'], 10, 95)),
                section_text: rgbToHex(...hslToRgb($hues['gray'], 10, 85)),
                primary_text: rgbToHex(...hslToRgb($hues['primary'], 30, 4)),
                primary_container_text: rgbToHex(...hslToRgb($hues['primary'], 40, 85)),
                secondary_text: rgbToHex(...hslToRgb($hues['secondary'], 30, 4)),
                secondary_container_text: rgbToHex(...hslToRgb($hues['secondary'], 40, 85)),
                tertiary_text: rgbToHex(...hslToRgb($hues['tertiary'], 30, 4)),
                tertiary_container_text: rgbToHex(...hslToRgb($hues['tertiary'], 40, 85)),
                destructive_text: rgbToHex(...hslToRgb($hues['red'], 30, 4)),
                destructive_container_text: rgbToHex(...hslToRgb($hues['red'], 40, 85)),
                subtitle: rgbToHex(...hslToRgb($hues['gray'], 10, 70)),
                hint: rgbToHex(...hslToRgb($hues['gray'], 10, 55)),
                outline: rgbToHex(...hslToRgb($hues['gray'], 10, 25)),
                backline: rgbToHex(...hslToRgb($hues['gray'], 8, 12)),

                // controls
                accent: rgbToHex(...hslToRgb($hues['primary'], 55, 65)),
                link: rgbToHex(...hslToRgb($hues['primary'], 50, 70)),
                focus: rgbToHex(...hslToRgb($hues['primary'], 20, 20)),

                // section
                section_header: rgbToHex(...hslToRgb($hues['primary'], 30, 50)),
                section_separator: rgbToHex(...hslToRgb($hues['gray'], 10, 2)),
            )
        );
    }
}

if (!function_exists('ui')) {
    /**
     * Retrieves the application settings for the authenticated user or defaults.
     *
     * @return stdClass Returns an object containing:
     * - 'color': The user's preferred color setting, or the default application color if not set.
     * - 'drawer': A boolean indicating whether the drawer is enabled, defaulting to true.
     * - 'dark': A boolean indicating the dark mode preference, defaulting to false.
     */
    function ui(): stdClass
    {
        return literal(
            color: auth()->check()
                ? (auth()->user()->settings?->color ?? config('nexus.color'))
                : config('nexus.color'),
            drawer: auth()->check() ? (auth()->user()->settings?->drawer ?? true) : true,
            dark: auth()->check() ? (auth()->user()->settings?->dark ?? false) : false,
        );
    }
}

if (!function_exists('price')) {
    /**
     *  Возвращает объект класса цены.
     *
     * @param int|float $val
     * @param null|string $currency
     * @return Price
     */
    function price(int|float $val, ?string $currency = null): Price
    {
        return new Price(value: $val, currency: $currency);
    }
}

