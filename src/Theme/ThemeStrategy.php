<?php

namespace NanoDepo\Nexus\Theme;

interface ThemeStrategy
{
    public function name(): string;

    public function palette(): Palette;

    public function normalizePrimary(string $hex): string;
}
