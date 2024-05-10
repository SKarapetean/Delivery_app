<?php

namespace App\Providers;

use App\Services\Repository\Read\UserReadRepository;
use App\Services\Repository\Read\UserReadRepositoryInterface;
use App\Services\Repository\Write\FIle\FileWriteRepository;
use App\Services\Repository\Write\FIle\FileWriteRepositoryInterface;
use App\Services\Repository\Write\Product\ProductWriteRepository;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;
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

        $this->app->bind(
            FileWriteRepositoryInterface::class,
            FileWriteRepository::class
        );

        $this->app->bind(
            ProductWriteRepositoryInterface::class,
            ProductWriteRepository::class
        );
    }

}
