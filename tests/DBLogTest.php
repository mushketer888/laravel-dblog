<?php

use PHPUnit\Framework\TestCase;

class DBLogTest extends TestCase
{
    protected $log;

    protected $flash;

    public function setUp()
    {
       // $this->session = Mockery::spy('Laracasts\Flash\SessionStore');

        //$this->flash = new FlashNotifier($this->session);
    }

    /** @test */
    function it_unit_test()
    {
        $this->assertEmpty('');
    }


}