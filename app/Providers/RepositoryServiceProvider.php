<?php

namespace App\Providers;

use App\Services\Repository\Read\File\FileReadRepository;
use App\Services\Repository\Read\File\FileReadRepositoryInterface;
use App\Services\Repository\Read\Product\ProductReadRepository;
use App\Services\Repository\Read\Product\ProductReadRepositoryInterface;
use App\Services\Repository\Read\User\UserReadRepository;
use App\Services\Repository\Read\User\UserReadRepositoryInterface;
use App\Services\Repository\Write\FIle\FileWriteRepository;
use App\Services\Repository\Write\FIle\FileWriteRepositoryInterface;
use App\Services\Repository\Write\Product\ProductWriteRepository;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Repository\Write\User\UserWriteRepository;
use App\Services\Repository\Write\User\UserWriteRepositoryInterface;
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

        $this->app->bind(
            ProductReadRepositoryInterface::class,
            ProductReadRepository::class
        );

        $this->app->bind(
            FileReadRepositoryInterface::class,
            FileReadRepository::class
        );
    }

}
