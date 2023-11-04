<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Providers\Laravel;

use Davarch\FakerRussian\Faker;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

final class FakerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Generator::class, Faker::class);
    }
}
