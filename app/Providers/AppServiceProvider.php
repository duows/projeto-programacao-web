<?php

namespace App\Providers;

use App\Services\AutorService;
use App\Services\AutorServiceInterface;

use App\Services\PermissionService;
use App\Services\PermissionServiceInterface;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
