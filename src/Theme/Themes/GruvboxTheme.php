<?php

namespace NanoDepo\Nexus\Theme\Themes;

use NanoDepo\Nexus\Theme\AbstractThemeStrategy;
use NanoDepo\Nexus\Theme\Palette;

final class GruvboxTheme extends AbstractThemeStrategy
{
    protected function buildPalette(): Palette
    {
        return $this->buildPaletteFromColors($this->colorsFromConfig());
    }
}
