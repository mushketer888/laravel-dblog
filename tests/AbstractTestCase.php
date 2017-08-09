<?php
namespace Mushketer888\LaravelDblog\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Mushketer888\LaravelDblog\ServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{

    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        dump($app);
        return ServiceProvider::class;
    }
}