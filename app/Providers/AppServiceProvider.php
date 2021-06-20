<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->share([
            'count_all_users'=> \App\User::Role('user')->where('admin_verified',1)->count(),
            'count_all_providers'=> \App\User::Role('provider')->where('admin_verified',1)->count(),
            'count_all_not_activated'=> \App\User::where('admin_verified',0)->count(),
            'count_pending_orders'=> \App\Request::where('status','pending')->count(),
            'count_in_progress_orders'=> \App\Request::where('status','in-progress')->count(),
            'count_completed_orders'=> \App\Request::where('status','completed')->count(),
            'count_cancelled_orders'=> \App\Request::where('status','cancelled')->count(),

        ]);
    }
}
