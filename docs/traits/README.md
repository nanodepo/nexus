# Traits

Traits provided by `nanodepo/nexus`.

## HasAlert
- File: `src/Traits/HasAlert.php`
- Dispatches a `makeAlert` event with `(type, message)`.

```php
$this->alert('Saved', 'primary');
```

## WithModal
- File: `src/Traits/WithModal.php`
- Adds `public bool $opened` state and `open()/close()` methods.

```php
$this->open();
```

## HasImageWriter
- File: `src/Traits/HasImageWriter.php`
- Saves uploaded images to the `images` disk (WebP).

```php
$filename = $this->writeImage($file, 'products', 1000, 1000);
```
