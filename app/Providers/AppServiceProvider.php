<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Room;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        //biar bisa kebaca global
        $get_page_data = Page::where('id',1)->first();
        $get_room_data = Room::get(); 

        view()->share('global_page_data', $get_page_data);
        view()->share('global_room_data', $get_room_data);
    }
}
