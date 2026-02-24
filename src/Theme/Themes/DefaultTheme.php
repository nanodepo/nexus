<?php

namespace NanoDepo\Nexus\Theme\Themes;

use NanoDepo\Nexus\Theme\AbstractThemeStrategy;
use NanoDepo\Nexus\Theme\ColorMath;
use NanoDepo\Nexus\Theme\Palette;

final class DefaultTheme extends AbstractThemeStrategy
{
    protected function buildPalette(): Palette
    {
        $colors = $this->colorsFromConfig();
        $colors = $this->softenColors($colors);

        return $this->buildPaletteFromColors($colors);
    }

    /** @param array<string, string> $colors */
    private function softenColors(array $colors): array
    {
        $targetL = (float) ($this->config['target_lightness'] ?? 0.60);
        $maxC = (float) ($this->config['max_chroma'] ?? 0.16);
        $chromaScale = (float) ($this->config['chroma_scale'] ?? 0.65);

        $out = [];
        foreach ($colors as $name => $hex) {
            [$L, $C, $h] = ColorMath::hexToOklch($hex);
            $L = $targetL;
            $C = min($C * $chromaScale, $maxC);
            $out[$name] = ColorMath::oklchToHex($L, $C, $h);
        }

        return $out;
    }
}
