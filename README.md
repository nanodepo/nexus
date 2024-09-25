1. Создать базовый шаблон и определить его, как шаблон по умолчанию для livewire.

#### 2. Добавить в файл tailwindcss путь к шаблонам пакета и определить цвета темы. 

```
export default {
    content: [
        ...
        "./vendor/nanodepo/gems-ui/src/resources/views/**/*.blade.php"
    ]
    ...
}
```

#### 3. Добавить в конфиг диск images для сохранения изображений. 

```php
'images' => [
    'driver' => 'local',
    'root' => storage_path('app/public/images'),
    'url' => env('APP_URL').'/storage/images',
    'visibility' => 'public',
    'throw' => false,
],
```

#### 4. Опубликовать ресурсы

```shell
php artisan vendor:publish --tag=gems-ui
```

#### 5. Добавить gems-ui.css в сборку в базовом шабоне

```bladehtml
@vite([
    'resources/css/app.css',
    'resources/css/gems-ui.css',
    'resources/js/app.js'
])
```

#### 6. Для панелей навигации нужно добавить к body этот код:

```html
x-data="{ drawer: false }"
```
Примеры базового шаблона и других компонентов можно найти в папке examples.
