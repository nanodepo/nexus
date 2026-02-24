<?php

namespace NanoDepo\Nexus\Theme;

final class ColorMapper
{
    public function __construct(private readonly Palette $palette) {}

    public function normalizePrimary(string $hex): string
    {
        [$L, $C, $h] = ColorMath::hexToOklch($hex);
        $range = $this->palette->range();

        $L = $this->clamp($L, $range['minL'], $range['maxL']);
        $C = $this->clamp($C, $range['minC'], $range['maxC']);

        return ColorMath::oklchToHex($L, $C, $h);
    }

    /** @return array{name: string, hex: string, distance: float} */
    public function nearestPalette(string $hex): array
    {
        return $this->palette->nearest($hex);
    }

    private function clamp(float $value, float $min, float $max): float
    {
        if ($value < $min) {
            return $min;
        }
        if ($value > $max) {
            return $max;
        }
        return $value;
    }
}
