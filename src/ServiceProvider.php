<?php

namespace Mushketer888\LaravelDblog;

use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Monolog\Logger as Monolog;
use Illuminate\Log\LogServiceProvider as LaravelServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Mushketer888\LaravelDblog
 * @see http://laravel.com/docs/master/packages#service-providers
 * @see http://laravel.com/docs/master/providers
 */
class ServiceProvider extends LaravelServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @see http://laravel.com/docs/master/providers#deferred-providers
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @see http://laravel.com/docs/master/providers#the-register-method
     * @return void
     */
    public function register()
    {


    }

    /**
     * Application is booting
     *
     * @see http://laravel.com/docs/master/providers#the-boot-method
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        Event::listen(MessageLogged::class, function (MessageLogged $e) {
            try {
                \Mushketer888\LaravelDblog\DBLog::create(
                    [
                        'level' => $e->level,
                        'message' => $e->message,
                        'context' => $e->context,
                        'env' => ''
                    ]
                );
            } catch (\Exception $ex) {

            }
        });

    }

    protected function packagePath($path = '')
    {
        return sprintf("%s/../%s", __DIR__, $path);
    }

    /**
     * Register the package migrations
     *
     * @see http://laravel.com/docs/master/packages#publishing-file-groups
     * @return void
     */
    protected function registerMigrations()
    {
        $this->publishes([
            $this->packagePath('database/migrations') => database_path('/migrations')
        ], 'migrations');
    }


}
