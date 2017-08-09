<?php
namespace Mushketer888\LaravelDblog\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Mushketer888\LaravelDblog\ServiceProvider;
use PHPUnit\Framework\TestCase;

class DBLogTest extends AbstractPackageTestCase
{
    use ServiceProviderTrait;
    use DatabaseMigrations;


    protected function getServiceProviderClass($app)
    {
        return ServiceProvider::class;
    }


    public function test_table(){
       // dump(DB::table('logs')->get());
    }

    protected function setUp()
    {
       //$this->runDatabaseMigrations();
    }
}