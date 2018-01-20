<?php

namespace Tests\BotMan;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Drivers\Tests\FakeDriver;
use BotMan\BotMan\Drivers\Tests\ProxyDriver;
use BotMan\Studio\Testing\BotManTester;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

abstract class BotManTestCase extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';

        DriverManager::loadDriver(ProxyDriver::class);
        $fakeDriver = new FakeDriver();
        ProxyDriver::setInstance($fakeDriver);

        $app->make(Kernel::class)->bootstrap();

        $this->botman = $app->make('botman');
        $this->bot = new BotManTester($this->botman, $fakeDriver, $this);

        Hash::setRounds(5);

        return $app;
    }

    /**
     * @var BotMan
     */
    protected $botman;

    /**
     * @var BotManTester
     */
    protected $bot;
}
