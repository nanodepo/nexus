<?php

namespace NanoDepo\Nexus\Theme;

final class ColorMath
{
    private const M1 = [
        [0.4122214708, 0.5363325363, 0.0514459929],
        [0.2119034982, 0.6806995451, 0.1073969566],
        [0.0883024619, 0.2817188376, 0.6299787005],
    ];

    private const M2 = [
        [ 0.2104542553, 0.7936177850, -0.0040720468],
        [ 1.9779984951, -2.4285922050, 0.4505937099],
        [ 0.0259040371, 0.7827717662, -0.8086757660],
    ];

    private const M2_INV = [
        [ 1.0,  0.3963377774,  0.2158037573],
        [ 1.0, -0.1055613458, -0.0638541728],
        [ 1.0, -0.0894841775, -1.2914855480],
    ];

    private const M1_INV = [
        [ 4.0767416621, -3.3077115913, 0.2309699292],
        [-1.2684380046,  2.6097574011, -0.3413193965],
        [-0.0041960863, -0.7034186147, 1.7076147010],
    ];

    public static function hexToRgb01(string $hex): array
    {
        $hex = ltrim($hex, '#');
        if (strlen($hex) !== 6) {
            throw new \InvalidArgumentException('Hex must be 6 characters.');
        }

        return [
            hexdec(substr($hex, 0, 2)) / 255,
            hexdec(substr($hex, 2, 2)) / 255,
            hexdec(substr($hex, 4, 2)) / 255,
        ];
    }

    public static function rgb01ToHex(array $rgb): string
    {
        [$r, $g, $b] = $rgb;
        $r = self::linearToSrgb(self::clamp01($r));
        $g = self::linearToSrgb(self::clamp01($g));
        $b = self::linearToSrgb(self::clamp01($b));

        return sprintf('#%02x%02x%02x',
            (int) round($r * 255),
            (int) round($g * 255),
            (int) round($b * 255),
        );
    }

    public static function hexToOklch(string $hex): array
    {
        [$r, $g, $b] = self::hexToRgb01($hex);
        [$L, $a, $b2] = self::rgb01ToOklab($r, $g, $b);
        return self::oklabToOklch($L, $a, $b2);
    }

    public static function oklchToHex(float $L, float $C, float $h): string
    {
        [$L2, $a, $b] = self::oklchToOklab($L, $C, $h);
        [$r, $g, $b2] = self::oklabToRgb01($L2, $a, $b);
        return self::rgb01ToHex([$r, $g, $b2]);
    }

    public static function rgb01ToOklab(float $r, float $g, float $b): array
    {
        $r = self::srgbToLinear($r);
        $g = self::srgbToLinear($g);
        $b = self::srgbToLinear($b);

        $l = self::M1[0][0] * $r + self::M1[0][1] * $g + self::M1[0][2] * $b;
        $m = self::M1[1][0] * $r + self::M1[1][1] * $g + self::M1[1][2] * $b;
        $s = self::M1[2][0] * $r + self::M1[2][1] * $g + self::M1[2][2] * $b;

        $l_ = $l ** (1 / 3);
        $m_ = $m ** (1 / 3);
        $s_ = $s ** (1 / 3);

        $L = self::M2[0][0] * $l_ + self::M2[0][1] * $m_ + self::M2[0][2] * $s_;
        $a = self::M2[1][0] * $l_ + self::M2[1][1] * $m_ + self::M2[1][2] * $s_;
        $b = self::M2[2][0] * $l_ + self::M2[2][1] * $m_ + self::M2[2][2] * $s_;

        return [$L, $a, $b];
    }

    public static function oklabToRgb01(float $L, float $a, float $b): array
    {
        $l_ = self::M2_INV[0][0] * $L + self::M2_INV[0][1] * $a + self::M2_INV[0][2] * $b;
        $m_ = self::M2_INV[1][0] * $L + self::M2_INV[1][1] * $a + self::M2_INV[1][2] * $b;
        $s_ = self::M2_INV[2][0] * $L + self::M2_INV[2][1] * $a + self::M2_INV[2][2] * $b;

        $l = $l_ ** 3;
        $m = $m_ ** 3;
        $s = $s_ ** 3;

        $r = self::M1_INV[0][0] * $l + self::M1_INV[0][1] * $m + self::M1_INV[0][2] * $s;
        $g = self::M1_INV[1][0] * $l + self::M1_INV[1][1] * $m + self::M1_INV[1][2] * $s;
        $b = self::M1_INV[2][0] * $l + self::M1_INV[2][1] * $m + self::M1_INV[2][2] * $s;

        return [$r, $g, $b];
    }

    public static function oklabToOklch(float $L, float $a, float $b): array
    {
        $C = sqrt($a * $a + $b * $b);
        $h = rad2deg(atan2($b, $a));
        if ($h < 0) {
            $h += 360;
        }
        return [$L, $C, $h];
    }

    public static function oklchToOklab(float $L, float $C, float $h): array
    {
        $hr = deg2rad($h);
        $a = $C * cos($hr);
        $b = $C * sin($hr);
        return [$L, $a, $b];
    }

    public static function interpolateOklch(array $a, array $b, float $t): array
    {
        [$L1, $C1, $h1] = $a;
        [$L2, $C2, $h2] = $b;

        $dh = self::hueDelta($h1, $h2);
        $h = $h1 + $dh * $t;
        if ($h < 0) {
            $h += 360;
        } elseif ($h >= 360) {
            $h -= 360;
        }

        return [
            $L1 + ($L2 - $L1) * $t,
            $C1 + ($C2 - $C1) * $t,
            $h,
        ];
    }

    public static function hueDelta(float $h1, float $h2): float
    {
        $d = fmod(($h2 - $h1 + 540), 360) - 180;
        return $d;
    }

    public static function hueDistance(float $h1, float $h2): float
    {
        return abs(self::hueDelta($h1, $h2));
    }

    private static function srgbToLinear(float $c): float
    {
        return $c <= 0.04045 ? $c / 12.92 : (($c + 0.055) / 1.055) ** 2.4;
    }

    private static function linearToSrgb(float $c): float
    {
        return $c <= 0.0031308 ? 12.92 * $c : 1.055 * ($c ** (1 / 2.4)) - 0.055;
    }

    private static function clamp01(float $c): float
    {
        return max(0.0, min(1.0, $c));
    }
}
