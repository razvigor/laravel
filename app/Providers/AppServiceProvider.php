<?php

namespace App\Providers;

use App\Item;
use App\User;
use App\Masina;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use App\Observers\MasinaObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Item::observe(ItemObserver::class);
        User::observe(UserObserver::class);
        Masina::observe(MasinaObserver::class);}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
