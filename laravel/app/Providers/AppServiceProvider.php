<?php

namespace App\Providers;

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
        // 本番環境でページネーション2ページ目以降を表示する
        if(app('env')=='production'){
            \URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS','on');
        }
    }
}
