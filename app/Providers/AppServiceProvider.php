<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Folder;
use App\Observers\FolderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Folder::observe(FolderObserver::class);
    }
}
