<?php

namespace NanoDepo\Nexus\Theme;

final class Palette
{
    /** @var array<string, string> */
    private array $baseColors;
    /** @var array<string, string> */
    private array $colors;

    public function __construct(
        private readonly string $name,
        array $baseColors,
        array $colors
    ) {
        $this->baseColors = $baseColors;
        $this->colors = $colors;
    }

    public function name(): string
    {
        return $this->name;
    }

    /** @return array<string, string> */
    public function baseColors(): array
    {
        return $this->baseColors;
    }

    /** @return array<string, string> */
    /** @return array<string, string> */
    public function colors(): array
    {
        return $this->colors;
    }

    public function color(string $name): ?string
    {
        return $this->colors[$name] ?? null;
    }

    /** @return array{minL: float, maxL: float, minC: float, maxC: float} */
    public function range(): array
    {
        $minL = 1.0;
        $maxL = 0.0;
        $minC = 1.0;
        $maxC = 0.0;

        foreach ($this->baseColors as $hex) {
            [$L, $C] = $this->lch($hex);
            $minL = min($minL, $L);
            $maxL = max($maxL, $L);
            $minC = min($minC, $C);
            $maxC = max($maxC, $C);
        }

        return [
            'minL' => $minL,
            'maxL' => $maxL,
            'minC' => $minC,
            'maxC' => $maxC,
        ];
    }

    /** @return array{name: string, hex: string, distance: float} */
    public function nearest(string $hex): array
    {
        [$L1, $a1, $b1] = ColorMath::rgb01ToOklab(...ColorMath::hexToRgb01($hex));

        $best = null;
        foreach ($this->colors as $name => $colorHex) {
            [$L2, $a2, $b2] = ColorMath::rgb01ToOklab(...ColorMath::hexToRgb01($colorHex));
            $d = sqrt(($L1 - $L2) ** 2 + ($a1 - $a2) ** 2 + ($b1 - $b2) ** 2);
            if ($best === null || $d < $best['distance']) {
                $best = [
                    'name' => $name,
                    'hex' => $colorHex,
                    'distance' => $d,
                ];
            }
        }

        return $best ?? ['name' => '', 'hex' => $hex, 'distance' => 0.0];
    }

    private function lch(string $hex): array
    {
        [$L, $C] = ColorMath::hexToOklch($hex);
        return [$L, $C];
    }
}
