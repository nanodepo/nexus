# Alerts

Session-based flash alert helpers.

## Flash
- File: `src/Alert/Flash.php`
- Stores a message and type in the session (`alert_message`, `alert_type`).
- Methods: `primary()`, `secondary()`, `tertiary()`, `error()`.

```php
alert()->primary('Saved');
```

## FlashMessage
- File: `src/Alert/FlashMessage.php`
- Simple container for `message()` and `type()`.
