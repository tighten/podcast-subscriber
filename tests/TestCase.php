<?php

namespace Tests;

use Dotenv\Dotenv;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        if (file_exists(dirname(__DIR__) . '/.env.test')) {
            (new Dotenv(dirname(__DIR__), '.env.test'))->load();
        }

        $app->make(Kernel::class)->bootstrap();

        Hash::setRounds(4);

        return $app;
    }
}
