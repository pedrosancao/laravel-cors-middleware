# CORS middleware for Laravel

CORS middleware Laravel 5.5 and above.

## Installation

Preferable use composer

```sh
composer require pedrosancao/laravel-cors-middleware
```

## Usage

Enable  middleware for route:

```php
Route::get('sample', function () {
    //
})->middleware('cors');
```

## Configuration

You may configure allowed domains and headers.

First option is to set on `.env`: allowed domains with `ALLOWED_CORS_DOMAINS` having
fallback to `APP_URL` and allowed header with `ALLOWED_CORS_HEADERS`.

To add more than one domain our header separated them with comma.

To have full control of configuration you may copy the config file with:

```sh
php artisan vendor:publish --tag=cors-middlware
```

## Licence

This library is release under the [MIT licence](LICENCE.md).
