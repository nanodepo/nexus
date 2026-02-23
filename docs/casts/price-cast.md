# PriceCast

Eloquent cast for price values using `config('nexus.precision')`.

## Source
- `src/Casts/PriceCast.php`

## Behavior
- `get()`: divides stored value by `precision`.
- `set()`: multiplies input value by `precision`.

## Example
```php
protected $casts = [
    'price' => \NanoDepo\Nexus\Casts\PriceCast::class,
];
```
