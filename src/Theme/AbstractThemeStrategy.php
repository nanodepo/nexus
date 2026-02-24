<?php

namespace NanoDepo\Nexus\Theme;

abstract class AbstractThemeStrategy implements ThemeStrategy
{
    private ?Palette $palette = null;

    /** @param array<string, mixed> $config */
    public function __construct(
        private readonly string $name,
        protected array $config = [],
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function palette(): Palette
    {
        if ($this->palette === null) {
            $this->palette = $this->buildPalette();
        }

        return $this->palette;
    }

    public function normalizePrimary(string $hex): string
    {
        return (new ColorMapper($this->palette()))->normalizePrimary($hex);
    }

    /** @return array<string, string> */
    protected function colorsFromConfig(): array
    {
        $colors = $this->config['colors'] ?? null;
        if (!is_array($colors)) {
            throw new \InvalidArgumentException("Theme {$this->name} must define colors.");
        }

        return PaletteBuilder::normalizeColors($colors);
    }

    /** @param array<string, string> $colors */
    protected function buildPaletteFromColors(array $colors): Palette
    {
        return PaletteBuilder::build($this->name, ['colors' => $colors]);
    }

    abstract protected function buildPalette(): Palette;
}
