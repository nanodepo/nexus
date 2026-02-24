<?php

namespace NanoDepo\Nexus\Theme;

final class PaletteBuilder
{
    private const BASE_ORDER = ['red', 'orange', 'yellow', 'green', 'aqua', 'blue', 'purple'];
    private const INTERMEDIATE_NAMES = [
        'red-orange',
        'orange-yellow',
        'yellow-green',
        'green-aqua',
        'aqua-blue',
        'blue-purple',
        'purple-red',
    ];

    /** @param array<string, mixed> $definition */
    public static function build(string $name, array $definition): Palette
    {
        if (isset($definition['colors'])) {
            $baseColors = self::normalizeColors($definition['colors']);
        } else {
            throw new \InvalidArgumentException('Palette definition must include colors.');
        }

        $colors = self::buildOrderedColors($baseColors);

        return new Palette($name, $baseColors, $colors);
    }

    /** @param array<string, string> $baseColors */
    private static function buildOrderedColors(array $baseColors): array
    {
        $ordered = [];
        $names = self::BASE_ORDER;

        for ($i = 0; $i < count($names); $i++) {
            $currentName = $names[$i];
            $nextName = $names[($i + 1) % count($names)];

            $currentHex = $baseColors[$currentName];
            $nextHex = $baseColors[$nextName];

            $ordered[$currentName] = $currentHex;

            $a = ColorMath::hexToOklch($currentHex);
            $b = ColorMath::hexToOklch($nextHex);
            $mid = ColorMath::interpolateOklch($a, $b, 0.5);
            $midHex = ColorMath::oklchToHex(...$mid);

            $ordered[self::INTERMEDIATE_NAMES[$i]] = $midHex;
        }

        return $ordered;
    }

    /** @param array<string, string> $colors */
    public static function normalizeColors(array $colors): array
    {
        $out = [];
        foreach ($colors as $name => $hex) {
            $hex = trim((string) $hex);
            if (!preg_match('/^#?[0-9a-fA-F]{6}$/', $hex)) {
                throw new \InvalidArgumentException("Invalid hex color for {$name}");
            }
            $out[$name] = '#' . ltrim($hex, '#');
        }
        return $out;
    }
}
