<?php

namespace NanoDepo\Nexus\Theme;

final class ThemeRegistry
{
    /** @var array<string, ThemeStrategy> */
    private static array $themes = [];

    public static function theme(?string $name = null): ThemeStrategy
    {
        $name = $name ?? config('nexus.theme', 'default');

        if (isset(self::$themes[$name])) {
            return self::$themes[$name];
        }

        $definitions = config('nexus.themes', []);
        if (!isset($definitions[$name])) {
            throw new \InvalidArgumentException("Theme not found: {$name}");
        }

        $definition = $definitions[$name];
        $handler = $definition['handler'] ?? null;
        if (!$handler || !is_string($handler) || !class_exists($handler)) {
            throw new \InvalidArgumentException("Theme handler not found for: {$name}");
        }

        $theme = new $handler($name, $definition);
        if (!$theme instanceof ThemeStrategy) {
            throw new \InvalidArgumentException("Theme handler must implement ThemeStrategy: {$name}");
        }

        self::$themes[$name] = $theme;

        return $theme;
    }

    public static function palette(?string $name = null): Palette
    {
        return self::theme($name)->palette();
    }

    /** @return array<string, string> */
    public static function colors(?string $name = null): array
    {
        return self::palette($name)->colors();
    }

}
