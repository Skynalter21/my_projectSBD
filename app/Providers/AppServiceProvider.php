<?php

namespace App\Providers;

use App\Http\Services\DisciplinaService;
use App\Http\Services\DisciplinaServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DisciplinaServiceInterface::class, DisciplinaService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
