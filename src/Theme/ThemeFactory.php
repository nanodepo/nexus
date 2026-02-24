<?php

namespace NanoDepo\Nexus\Theme;

use stdClass;

final class ThemeFactory
{
    public function __construct(private readonly ThemeStrategy $strategy) {}

    public static function fromConfig(): self
    {
        return new self(ThemeRegistry::theme());
    }

    public function make(string $primaryHex, ?string $scheme = null): stdClass
    {
        $scheme = strtolower($scheme ?? config('nexus.scheme', 'smart'));

        $palette = $this->strategy->palette();

        $mapper = new ColorMapper($palette);
        $primaryHex = $this->strategy->normalizePrimary($primaryHex);

        if ($scheme === 'smart') {
            [$secondaryHex, $tertiaryHex] = $this->resolveSmartPalette($palette, $primaryHex);
        } else {
            [$pL, $pC, $pH] = ColorMath::hexToOklch($primaryHex);

            [$hSecondary, $hTertiary] = $this->resolveSchemeHues($pH, $scheme);

            $secondaryTarget = ColorMath::oklchToHex($pL, $pC, $hSecondary);
            $tertiaryTarget = ColorMath::oklchToHex($pL, $pC, $hTertiary);

            $secondaryHex = $mapper->nearestPalette($secondaryTarget)['hex'];
            $tertiaryHex = $mapper->nearestPalette($tertiaryTarget)['hex'];
        }

        $successHex = $palette->color('green') ?? $secondaryHex;
        $destructiveHex = $palette->color('red') ?? $primaryHex;

        [$hPrimary, $sPrimary] = $this->hueSat($primaryHex);
        [$hSecondary2, $sSecondary] = $this->hueSat($secondaryHex);
        [$hTertiary2, $sTertiary] = $this->hueSat($tertiaryHex);
        [$hError, $sError] = $this->hueSat($destructiveHex);
        [$hSuccess, $sSuccess] = $this->hueSat($successHex);

        $getTone = function ($h, $s, $tone) {
            return rgbToHex(...hslToRgb($h, $s, $tone));
        };

        // Functional colors
        $p = [$hPrimary, $sPrimary];
        $sec = [$hSecondary2, $sSecondary];
        $ter = [$hTertiary2, $sTertiary];
        $err = [$hError, $sError];
        $suc = [$hSuccess, $sSuccess];

        // Neutrals derived from primary hue
        $neu = [$hPrimary, 4];
        $neuV = [$hPrimary, 8];
        $neuP = [$hPrimary, 30];

        return literal(
            light: literal(
                primary:           $getTone(...$p, tone: 40),
                primary_container: $getTone(...$p, tone: 82),
                secondary:           $getTone(...$sec, tone: 40),
                secondary_container: $getTone(...$sec, tone: 82),
                tertiary:           $getTone(...$ter, tone: 40),
                tertiary_container: $getTone(...$ter, tone: 82),
                destructive:           $getTone(...$err, tone: 40),
                destructive_container: $getTone(...$err, tone: 82),
                success:               $getTone(...$suc, tone: 40),
                success_container:     $getTone(...$suc, tone: 82),

                background: $getTone(...$neu, tone: 90),
                front:      $getTone(...$neu, tone: 93),
                surface:    $getTone(...$neu, tone: 96),
                section:    $getTone(...$neu, tone: 99),

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

                text:         $getTone(...$neu, tone: 10),
                section_text: $getTone(...$neu, tone: 10),
                subtitle:     $getTone(...$neuV, tone: 40),
                hint:         $getTone(...$neuV, tone: 50),

                outline:  $getTone(...$neuV, tone: 75),
                backline: $getTone(...$neuV, tone: 85),

                accent: $getTone(...$p, tone: 40),
                link:   $getTone(...$p, tone: 40),
                focus:  $getTone(...$neuP, tone: 75),

                section_header:    $getTone(...$neuP, tone: 40),
                section_separator: $getTone(...$neuV, tone: 90),

                gray: $getTone(...$neu, tone: 50),
                foreground: $getTone(...$neu, tone: 10),
            ),
            dark: literal(
                primary:               $getTone(...$p, tone: 70),
                primary_container:     $getTone(...$p, tone: 24),
                secondary:             $getTone(...$sec, tone: 70),
                secondary_container:   $getTone(...$sec, tone: 24),
                tertiary:              $getTone(...$ter, tone: 70),
                tertiary_container:    $getTone(...$ter, tone: 24),
                destructive:           $getTone(...$err, tone: 70),
                destructive_container: $getTone(...$err, tone: 24),
                success:               $getTone(...$suc, tone: 70),
                success_container:     $getTone(...$suc, tone: 24),

                background: $getTone(...$neu, tone: 1),
                front:      $getTone(...$neu, tone: 4),
                surface:    $getTone(...$neu, tone: 7),
                section:    $getTone(...$neu, tone: 10),

                primary_text:           $getTone(...$p, tone: 10),
                primary_container_text: $getTone(...$p, tone: 90),
                secondary_text:           $getTone(...$sec, tone: 10),
                secondary_container_text: $getTone(...$sec, tone: 90),
                tertiary_text:           $getTone(...$ter, tone: 10),
                tertiary_container_text: $getTone(...$ter, tone: 90),
                destructive_text:           $getTone(...$err, tone: 10),
                destructive_container_text: $getTone(...$err, tone: 90),
                success_text:               $getTone(...$suc, tone: 10),
                success_container_text:     $getTone(...$suc, tone: 90),

                text:         $getTone(...$neu, tone: 90),
                section_text: $getTone(...$neu, tone: 90),
                subtitle:     $getTone(...$neuV, tone: 70),
                hint:         $getTone(...$neuV, tone: 60),

                outline:  $getTone(...$neuV, tone: 25),
                backline: $getTone(...$neuV, tone: 12),

                accent: $getTone(...$p, tone: 80),
                link:   $getTone(...$p, tone: 80),
                focus:  $getTone(...$neuP, tone: 25),

                section_header:    $getTone(...$neuP, tone: 60),
                section_separator: $getTone(...$neuV, tone: 3),

                gray: $getTone(...$neu, tone: 50),
                foreground: $getTone(...$neu, tone: 90),
            )
        );
    }

    private function resolveSchemeHues(float $primaryHue, string $scheme): array
    {
        return match ($scheme) {
            'analogous' => [
                fmod($primaryHue - 10 + 360, 360),
                fmod($primaryHue + 30 + 360, 360),
            ],
            'triadic' => [
                fmod($primaryHue + 120, 360),
                fmod($primaryHue + 240, 360),
            ],
            default => [
                // split complementary
                fmod($primaryHue + 180 + 25, 360),
                fmod($primaryHue + 180 - 25 + 360, 360),
            ],
        };
    }

    /** @return array{0: string, 1: string} */
    private function resolveSmartPalette(Palette $palette, string $primaryHex): array
    {
        $baseOrder = ['red', 'orange', 'yellow', 'green', 'aqua', 'blue', 'purple'];
        $baseColors = $palette->baseColors();

        $primaryIndex = $this->nearestBaseIndex($baseOrder, $baseColors, $primaryHex);

        $secondaryIndex = $this->clampIndex($primaryIndex - 1, 0, count($baseOrder) - 1);
        $tertiaryIndex = $this->clampIndex($primaryIndex + 2, 0, count($baseOrder) - 1);

        $secondaryName = $baseOrder[$secondaryIndex];
        $tertiaryName = $baseOrder[$tertiaryIndex];

        $secondaryHex = $baseColors[$secondaryName];
        $tertiaryHex = $baseColors[$tertiaryName];

        if ($secondaryName === 'red' || $secondaryName === 'green') {
            $secondaryHex = $this->halfStepBase($baseOrder, $baseColors, $secondaryIndex, -1);
        }

        if ($tertiaryName === 'red' || $tertiaryName === 'green') {
            $tertiaryHex = $this->halfStepBase($baseOrder, $baseColors, $tertiaryIndex, 1);
        }

        return [$secondaryHex, $tertiaryHex];
    }

    /** @param array<int, string> $order @param array<string, string> $colors */
    private function nearestBaseIndex(array $order, array $colors, string $hex): int
    {
        [$L1, $a1, $b1] = ColorMath::rgb01ToOklab(...ColorMath::hexToRgb01($hex));

        $bestIndex = 0;
        $bestDistance = null;

        foreach ($order as $index => $name) {
            $colorHex = $colors[$name] ?? null;
            if (!$colorHex) {
                continue;
            }
            [$L2, $a2, $b2] = ColorMath::rgb01ToOklab(...ColorMath::hexToRgb01($colorHex));
            $d = sqrt(($L1 - $L2) ** 2 + ($a1 - $a2) ** 2 + ($b1 - $b2) ** 2);
            if ($bestDistance === null || $d < $bestDistance) {
                $bestDistance = $d;
                $bestIndex = $index;
            }
        }

        return $bestIndex;
    }

    /** @param array<int, string> $order @param array<string, string> $colors */
    private function halfStepBase(array $order, array $colors, int $index, int $direction): string
    {
        $maxIndex = count($order) - 1;
        $nextIndex = $index + ($direction >= 0 ? 1 : -1);

        if ($nextIndex < 0 || $nextIndex > $maxIndex) {
            $nextIndex = $index + ($direction >= 0 ? -1 : 1);
        }

        $aHex = $colors[$order[$index]];
        $bHex = $colors[$order[$nextIndex]];

        $a = ColorMath::hexToOklch($aHex);
        $b = ColorMath::hexToOklch($bHex);
        $mid = ColorMath::interpolateOklch($a, $b, 0.5);

        return ColorMath::oklchToHex(...$mid);
    }

    private function clampIndex(int $index, int $min, int $max): int
    {
        return max($min, min($max, $index));
    }

    private function hueSat(string $hex): array
    {
        [$h, $s] = rgbToHsl(...hexToRgb($hex));
        return [$h, $s];
    }
}
