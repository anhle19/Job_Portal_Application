<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

        //Gọi dữ liệu không cần thông qua controller
        $banner_data = Banner::where('id',1)->first();
        $setting_data = Setting::where('id',1)->first();
        view()->share('global_banner_data', $banner_data);
        view()->share('global_setting_data', $setting_data);
    }
}
