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
    /**
     * Generates a theme's color palette based on a primary hex color.
     *
     * @param string $primaryHex The primary color in hexadecimal format.
     *
     * @return stdClass An object containing 'light' and 'dark' theme color palettes.
     */
    function generateTheme(string $primaryHex): stdClass
    {
        // Internal helper: Convert tonal value (0-100) to Lightness (0-100)
        // Material 3 uses Tones where 0 is Black, 100 is White.
        // HSL Lightness is similar but not 1:1 linear with perceived brightness,
        // but for this implementation we map Tone to Lightness directly as a good approximation.
        // Tone 40 = Lightness 40%.
        $getTone = function ($h, $s, $tone) {
            return rgbToHex(...hslToRgb($h, $s, $tone));
        };

        // Internal helper: Smart Harmony
        // Shifts target Hue towards Primary Hue to make them feel related.
        $harmonize = function ($targetHue, $primaryHue) {
            $diff = $targetHue - $primaryHue;
            // Shortest path around the circle
            if ($diff > 180) $diff -= 360;
            if ($diff < -180) $diff += 360;

            // Shift by 10% of the difference towards primary
            // But only if they are within 120 degrees (don't mix complementary too much)
            if (abs($diff) < 120) {
                 return fmod($targetHue - ($diff * 0.15) + 360, 360);
            }
            return $targetHue;
        };

        list($r, $g, $b) = hexToRgb($primaryHex);
        list($hPrimary, $sPrimary, $lPrimary) = rgbToHsl($r, $g, $b);

        // --- Determine Hues ---

        // Secondary & Tertiary: Smart Generation vs Classic geometry
        $scheme = config('nexus.scheme', 'smart'); // Default to smart if not set

        if ($scheme === 'smart') {
            // Smart: Secondary is close to Primary but distinct (Analougus-ish or lighter chroma)
            // Let's try: Secondary = Primary + 15deg, Less Saturation?
            // Or stick to Material 3 "Secondary" which is often less chromatic.
            // Let's use a subtle hue shift for Secondary.

            // Secondary: +15 deg
            $hSecondary = fmod($hPrimary + 15 + 360, 360);

            // Tertiary: +120 deg (Triadic) or +60 (Analogous extended)
            // Material 3 suggests Tertiary is a temperature shift.
            // If Primary is Cool, Tertiary could be Warm.
            // Let's go with +60 degrees for a balanced accent.
            $hTertiary = fmod($hPrimary + 60, 360);
        } else {
             // Fallback to legacy geometric schemes
             $schemes = match ($scheme) {
                'analogous' => getAnalogousColors($hPrimary),
                'triadic' => getTriadicColors($hPrimary),
                default => getSplitComplementaryColors($hPrimary),
            };
            $hSecondary = $schemes['secondary'];
            $hTertiary = $schemes['tertiary'];
        }

        // Functional Colors
        $hError = 0;   // Red
        $hSuccess = 140; // Green (140 is a good robust green, 120 is pure green)

        // Harmonize Functional Colors with Primary
        // If the primary color is Blue (240), moving Red (0) slightly to Purple makes it fit better.
        // If Primary is Green (120), Red might stay Red.
        $hError = $harmonize($hError, $hPrimary);
        $hSuccess = $harmonize($hSuccess, $hPrimary);

        $hNeutral = $hPrimary; // Neutrals tinted with Primary hue

        // --- Define Tones ---
        // We capture Closure for easy generation
        // Param structure: [$h, $s]

        // Primary
        $p = [$hPrimary, $sPrimary];

        // Secondary: Lower saturation usually? Let's keep input Saturation but cap it if too high?
        // For now, use primary saturation for harmony, or slightly reduced.
        // Let's simply use the calculated Hues and Primary's Saturation (maybe -10 for Secondary/Tertiary to distinguish)
        $sSecondary = max(0, $sPrimary - 10);
        $sec = [$hSecondary, $sSecondary];

        $sTertiary = $sPrimary; // Accent can be vibrant
        $ter = [$hTertiary, $sTertiary];

        $err = [$hError, 90]; // Destructive usually high saturation
        $suc = [$hSuccess, 80]; // Success also vibrant

        // Neutrals: Very low saturation primary
        $neu = [$hNeutral, 4]; // Surface/Backgrounds
        // Neutral Variant: Slightly higher saturation for outlines/text
        $neuV = [$hNeutral, 8];

        return literal(
            light: literal(
                // Usage: $getTone($h, $s, $tone)

                // Key Colors
                primary:           $getTone(...$p, tone: 40),
                primary_container: $getTone(...$p, tone: 90),
                secondary:           $getTone(...$sec, tone: 40),
                secondary_container: $getTone(...$sec, tone: 90),
                tertiary:           $getTone(...$ter, tone: 40),
                tertiary_container: $getTone(...$ter, tone: 90),
                destructive:           $getTone(...$err, tone: 40),
                destructive_container: $getTone(...$err, tone: 90),
                success:               $getTone(...$suc, tone: 40),
                success_container:     $getTone(...$suc, tone: 90),

                // Backgrounds (Neutral)
                // Surface is Tone 98 in MD3, Background Tone 98/99.
                background: $getTone(...$neu, tone: 90),
                front:      $getTone(...$neu, tone: 93), // Slightly darker surface (if needed) or same.
                surface:    $getTone(...$neu, tone: 96), // Cards/Surfaces
                section:    $getTone(...$neu, tone: 99), // Distinct sections

                // Text & Icons (On Colors)
                // On Primary is Tone 100 (White) or 10
                primary_text:           $getTone(...$p, tone: 100),
                primary_container_text: $getTone(...$p, tone: 10),
                secondary_text:           $getTone(...$sec, tone: 100),
                secondary_container_text: $getTone(...$sec, tone: 10),
                tertiary_text:           $getTone(...$ter, tone: 100),
                tertiary_container_text: $getTone(...$ter, tone: 10),
                destructive_text:           $getTone(...$err, tone: 100),
                destructive_container_text: $getTone(...$err, tone: 10),
                success_text:               $getTone(...$suc, tone: 100),
                success_container_text:     $getTone(...$suc, tone: 10),

                // General Text (On Surface)
                text:         $getTone(...$neu, tone: 10), // Almost black
                section_text: $getTone(...$neu, tone: 10),
                subtitle:     $getTone(...$neuV, tone: 40),
                hint:         $getTone(...$neuV, tone: 50),

                // Outlines / Separators
                outline:  $getTone(...$neuV, tone: 75), // Inputs etc
                backline: $getTone(...$neuV, tone: 85), // Borders

                // Extras / Legacy mapping
                accent: $getTone(...$p, tone: 40),
                link:   $getTone(...$p, tone: 40),
                focus:  $getTone(...$p, tone: 80), // Highlight ring

                section_header:    $getTone(...$p, tone: 40),
                section_separator: $getTone(...$neuV, tone: 90),

                // Add gray for compatibility if needed, though we use neutrals now
                gray: $getTone(...$neu, tone: 50),
                foreground: $getTone(...$neu, tone: 10),
            ),
            dark: literal(
                 // Dark Mode Tones:
                 // Primary: 80
                 // OnPrimary: 20
                 // Container: 30
                 // OnContainer: 90

                primary:           $getTone(...$p, tone: 80),
                primary_container: $getTone(...$p, tone: 30),
                secondary:           $getTone(...$sec, tone: 80),
                secondary_container: $getTone(...$sec, tone: 30),
                tertiary:           $getTone(...$ter, tone: 80),
                tertiary_container: $getTone(...$ter, tone: 30),
                destructive:           $getTone(...$err, tone: 80),
                destructive_container: $getTone(...$err, tone: 30),
                success:               $getTone(...$suc, tone: 80),
                success_container:     $getTone(...$suc, tone: 30),

                // Dark Backgrounds
                // Background: Tone 6
                // Surface: Tone 12
                background: $getTone(...$neu, tone: 1),
                front:      $getTone(...$neu, tone: 4), // Slightly lighter
                surface:    $getTone(...$neu, tone: 7),
                section:    $getTone(...$neu, tone: 10),

                // Dark Text
                primary_text:           $getTone(...$p, tone: 20),
                primary_container_text: $getTone(...$p, tone: 90),
                secondary_text:           $getTone(...$sec, tone: 20),
                secondary_container_text: $getTone(...$sec, tone: 90),
                tertiary_text:           $getTone(...$ter, tone: 20),
                tertiary_container_text: $getTone(...$ter, tone: 90),
                destructive_text:           $getTone(...$err, tone: 20),
                destructive_container_text: $getTone(...$err, tone: 90),
                success_text:               $getTone(...$suc, tone: 20),
                success_container_text:     $getTone(...$suc, tone: 90),

                // General Text
                text:         $getTone(...$neu, tone: 90),
                section_text: $getTone(...$neu, tone: 90),
                subtitle:     $getTone(...$neuV, tone: 70),
                hint:         $getTone(...$neuV, tone: 60),

                // Outlines
                outline:  $getTone(...$neuV, tone: 25),
                backline: $getTone(...$neuV, tone: 12),

                // Extras
                accent: $getTone(...$p, tone: 80),
                link:   $getTone(...$p, tone: 80),
                focus:  $getTone(...$p, tone: 30),

                section_header:    $getTone(...$p, tone: 80),
                section_separator: $getTone(...$neuV, tone: 20),

                gray: $getTone(...$neu, tone: 50),
                foreground: $getTone(...$neu, tone: 90),
            )
        );
    }
}

if (!function_exists('gradient')) {
    /**
     * Generates an array of hex colors creating a gradient between two theme colors.
     *
     * @param int $count Number of steps (colors) to generate.
     * @param string $from The name of the starting color (e.g., 'destructive', 'primary').
     * @param string $to The name of the ending color (e.g., 'success', 'primary').
     * @param bool $isDark Theme mode: true for dark theme, false for light theme.
     * @param bool $isContainer Whether to use the container variant of the specified colors.
     *
     * @return array Array of hex color strings.
     */
    function gradient(int $count, string $from = 'destructive', string $to = 'success', bool $isDark = false, bool $isContainer = false): array
    {
        if ($count <= 0) {
            return [];
        }

        // Get the current theme based on user settings or config
        $theme = generateTheme(ui()->color);
        $palette = $isDark ? $theme->dark : $theme->light;

        // Resolve keys (append '_container' if requested)
        $resolveKey = function ($key) use ($isContainer) {
            if ($isContainer && !str_ends_with($key, '_container')) {
                return $key . '_container';
            }
            return $key;
        };

        $keyFrom = $resolveKey($from);
        $keyTo = $resolveKey($to);

        // Retrieve hex colors (fallback to black/white)
        $hexFrom = $palette->{$keyFrom} ?? '#000000';
        $hexTo = $palette->{$keyTo} ?? '#ffffff';

        // Convert to HSL
        $hslFrom = rgbToHsl(...hexToRgb($hexFrom));
        $hslTo = rgbToHsl(...hexToRgb($hexTo));

        $colors = [];

        for ($i = 0; $i < $count; $i++) {
            $t = $count > 1 ? $i / ($count - 1) : 0;

            // Interpolate HSL
            $h = lerp($hslFrom[0], $hslTo[0], $t);
            $s = lerp($hslFrom[1], $hslTo[1], $t);
            $l = lerp($hslFrom[2], $hslTo[2], $t);

            $colors[] = rgbToHex(...hslToRgb($h, $s, $l));
        }

        return $colors;
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

