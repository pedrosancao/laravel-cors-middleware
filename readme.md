# CORS middleware for Laravel 5 and 6

CORS middleware for Laravel 5.5 to 5.8 and 6.x.

Laravel 7 comes with [fruitcake/laravel-cors](https://github.com/fruitcake/laravel-cors),
so we recommend you go with it.

This package is pretty simple, load configuration from `.env` and also handles
[Preflight request](https://developer.mozilla.org/en-US/docs/Glossary/Preflight_request)
and custom headers.

## Installation

Preferable use composer

```sh
composer require pedrosancao/laravel-cors-middleware
```

We use package [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery)
so there's no need to modify any files to enable the middleware, just install and go.

## Usage

Enable middleware for route:

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
