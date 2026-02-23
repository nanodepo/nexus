# Helpers

Global helper functions exposed by `packages/nanodepo/nexus/src/helpers.php`.

## alert()
Returns a Flash alert service for session messages.

```php
alert()->primary('Saved');
```

## thumbnail(item, size = null, dir = null)
Builds a thumbnail URL (or array of URLs) using the `thumbnail` route.

- `item`: string path, iterable of paths, or `null`
- `size`: e.g. `"500x500"` (defaults to `config('nexus.default_size')`)
- `dir`: e.g. `"products"` (defaults to `config('nexus.default_folder')`)

```php
thumbnail('/storage/images/other/example.webp');
thumbnail(['a.webp', 'b.webp'], '300x300', 'products');
```

## lerp(a, b, divider)
Linear interpolation between two values. `divider` must be within 0..1.

```php
lerp(0, 100, 0.25); // 25
```

## Color helpers
- `hexToRgb(string $hex): array`
- `rgbToHsl(float|int $r, float|int $g, float|int $b): array`
- `hslToRgb(float|int $h, float|int $s, float|int $l): array`
- `rgbToHex(int $r, int $g, int $b): string`

## Palette helpers
- `getAnalogousColors(float|int $h): array`
- `getTriadicColors(float|int $h): array`
- `getSplitComplementaryColors(float|int $h): array`

## generateTheme(primaryHex)
Generates `light` and `dark` palettes based on a primary hex color.

```php
$theme = generateTheme('#ff00aa');
$theme->light->primary;
```

## gradient(count, from = null, to = null)
Builds an array of colors interpolated in HSL between two colors. Supports:
- Palette names from `config('nexus.palette')`
- Direct hex values

```php
$colors = gradient(5, 'red', 'blue');      // palette names
$colors = gradient(5, '#cc241d', '#458588'); // hex values
```

Default palette and endpoints are controlled by:
```php
config('nexus.gradient.from');
config('nexus.gradient.to');
```

See `docs/palettes.md` for palette structure and the Gruvbox list.

Notes:
- If a palette name is not found, `gradient()` throws `InvalidArgumentException`.

## ui()
Returns user UI preferences as a `stdClass` with `color`, `drawer`, `dark`.

## price(val, currency = null)
Returns a `NanoDepo\Nexus\ValueObjects\Price` instance.

```php
price(199.99, 'USD');
```
