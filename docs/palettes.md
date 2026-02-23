# Palettes

Named color palette for Nexus. Palette lives in `src/config/nexus.php` under `palette`.

## Structure
The palette is an ordered map of `name => hex`.
Order is preserved and used by UI components (for example, the color picker).

```php
'palette' => [
    'red' => '#cc241d',
    'red-orange' => '#d24416',
    // ...
],
```

## Gruvbox Palette (current)
- red: `#cc241d`
- red-orange: `#d24416`
- orange: `#d65d0e`
- orange-yellow: `#d77d10`
- yellow: `#d79921`
- yellow-green: `#b79917`
- green: `#98971a`
- green-aqua: `#7b9c41`
- aqua: `#689d62`
- aqua-blue: `#47937b`
- blue: `#458588`
- blue-purple: `#6a7bad`
- purple: `#b16286`
- purple-red: `#c9405e`

## Gradient Defaults
```php
'gradient' => [
    'from' => env('NEXUS_GRADIENT_FROM', 'red'),
    'to' => env('NEXUS_GRADIENT_TO', 'purple'),
],
```

## Usage
```php
$colors = gradient(6);              // uses defaults above
$colors = gradient(6, 'red', 'blue');
$colors = gradient(6, '#cc241d', '#458588');
```

## Override in App
To customize the palette, override `nexus.palette` in your app config.
