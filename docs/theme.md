# Theme Factory

Theme generation is handled by `NanoDepo\Nexus\Theme\ThemeFactory` and uses the active theme palette from `config('nexus.theme')`.

## Behavior
- **Primary**: user color normalized to theme palette style (keeps hue, clamps lightness/chroma to palette range).
- **Secondary/Tertiary**: derived by scheme (`smart`, `analogous`, `triadic`, `split`) and snapped to the nearest theme palette color.
- **Success/Destructive**: pulled from palette colors (`green`, `red`).

## Usage
```php
$theme = generateTheme('#0088cc');
$theme->light->primary;
```

## Schemes
- `smart`: nearest base color to primary, then `secondary = -1 base step`, `tertiary = +2 base steps` (clamped to the palette ends)
- `analogous`: -10°, +30°
- `triadic`: +120°, +240°
- `split`: (complement ±25°)

Note for `smart`: if secondary or tertiary lands exactly on `red` or `green`, a half-step intermediate is used instead.

## Files
- `src/Theme/ThemeFactory.php`
- `src/Theme/ThemeRegistry.php`
- `src/Theme/ThemeStrategy.php`
- `src/Theme/AbstractThemeStrategy.php`
- `src/Theme/Themes/DefaultTheme.php`
- `src/Theme/Themes/GruvboxTheme.php`
- `src/Theme/Themes/CatppuccinTheme.php`
- `src/Theme/Themes/NordTheme.php`
- `src/Theme/PaletteBuilder.php`
- `src/Theme/ColorMapper.php`
- `src/Theme/ColorMath.php`
