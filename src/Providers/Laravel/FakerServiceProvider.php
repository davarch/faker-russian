<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Providers\Laravel;

use Davarch\FakerRussian\Faker;
use Davarch\FakerRussian\Providers\FakerProvider;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

final class FakerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Generator::class.':ru_RU', function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerProvider($faker));

            return $faker;
        });
    }
}
