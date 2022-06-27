<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Category;
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
        \Debugbar::disable();   
            view::composer('front.layouts.header', function ($view) {
            $view->with('pagelists',Db::table('pages')->where([['parent_id',0],['status',1],['position','header']])->select('name','type','link','slug')->orderBy('weight','ASC')->cursor());
            $view->with('header',Db::table('contactuses')->first());
            $view->with('setting',Db::table('settings')->first());
            $view->with('seo_head',Db::table('seos')->first());
           });

            view::composer('front.layouts.footer', function ($view) {
            $view->with('about',Db::table('pages')->where('position','footer')->where('name','ABOUT US')->where('status',1)->first());
            $view->with('quicklink',Db::table('pages')->where('position','footer')->select('name','id')->where('name','QUICK LINK')->where('status',1)->first());
            $view->with('bottoms',Db::table('pages')->where('position','bottom')->where('status',1)->orderBy('weight','asc')->get());
            $view->with('setting',Db::table('settings')->first());
            $view->with('header',Db::table('contactuses')->first()); 
            });
        //
    }
}
