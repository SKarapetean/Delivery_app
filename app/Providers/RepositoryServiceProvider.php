<?php

namespace App\Providers;

use App\Services\Repository\Read\UserReadRepository;
use App\Services\Repository\Read\UserReadRepositoryInterface;
use App\Services\Repository\Write\UserWriteRepository;
use App\Services\Repository\Write\UserWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );

        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );
    }

}
