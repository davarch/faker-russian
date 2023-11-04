<?php

declare(strict_types=1);

namespace Tests;

use Davarch\FakerRussian\Providers\Laravel\FakerServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class PackageTestCase extends TestCase
{
    /**
     * @param  Application  $app
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            FakerServiceProvider::class,
        ];
    }
}
