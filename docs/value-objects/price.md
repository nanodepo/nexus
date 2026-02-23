# Price

Value object for money values with currency context.

## Source
- `src/ValueObjects/Price.php`

## Constructor
```php
new Price(value: 199.99, currency: 'USD');
```

If `currency` is `null`, it uses the first key from `config('nexus.currencies')`. Throws if currency is not allowed.

## Methods
- `raw()`: value multiplied by `config('nexus.precision')`.
- `value()`: original numeric value.
- `currency()`: currency code string.
- `symbol()`: symbol from `config('nexus.currencies')`.
- `formatted()`: string with `config('nexus.decimals')` and symbol.
- `toJson()`, `toArray()`: returns raw numeric value.

## Helper
```php
price(199.99, 'USD');
```
