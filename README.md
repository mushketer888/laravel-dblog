# laravel-dblog


This package duplicates Log information to database table.

## Install

Via Composer

``` bash
$ composer require mushketer888/laravel-dblog
```

Add Service Provider to `config/app.php` in `providers` section
```php
Mushketer888\LaravelDblog\ServiceProvider::class,
```
You need to run the migrations for this package.

    $ php artisan vendor:publish --provider="Mushketer888\LaravelDblog\ServiceProvider" 
    $ php artisan migrate
## Usage

Use Log Facade like you normally use.
```php
    Log::info("DBLog works")
```
