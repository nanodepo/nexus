<?php

namespace NanoDepo\Nexus\Theme;

final class PaletteRegistry
{
    public static function palette(?string $name = null): Palette
    {
        return ThemeRegistry::palette($name);
    }

    /** @return array<string, string> */
    public static function colors(?string $name = null): array
    {
        return ThemeRegistry::colors($name);
    }
}
