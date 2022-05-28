<?php

namespace App\Providers;

use App\Helper\CartHelper;
use App\Models\DanhMuc;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        $danhmuc = DanhMuc::all();
        View::share(['danhmuc'=>$danhmuc]);
        
        view()->composer('*', function ($view) {
            $view->with([
                'cart' => new CartHelper()
            ]);
        });
    }
}
