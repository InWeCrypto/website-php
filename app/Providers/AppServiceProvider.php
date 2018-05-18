<?php

namespace App\Providers;

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
        $this->app->singleton('http_req', function () {
            return new \App\Services\HttpReqService();
        });

        view()->share('lang', \App::getLocale());
        view()->share('jss_version', 'version=1.55');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GlobalData::class, function () {
            return GlobalData::create([
                'locale1' => \App::getLocale()
            ]);
        });
    }
}
