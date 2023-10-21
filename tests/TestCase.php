<?php

namespace KaziRayhan\VivaWallet\Tests;

use KaziRayhan\VivaWallet\VivaWalletServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            VivaWalletServiceProvider::class,
        ];
    }
}
