<?php

namespace App\Providers;

use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Repositories\BookRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerRepositories();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }

    /**
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }
}
