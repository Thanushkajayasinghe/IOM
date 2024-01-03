<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        view()->composer('layout', function ($view) {
            $pages = [];
            $userGroupId = Session::get('userGroup');

            $sqlPg = DB::table('tbl_user_group_permission')
                ->where('user_group_serial', $userGroupId)
                ->where(function ($query) {
                    $query->where('read_only', '=', 'true')
                        ->orWhere('read_write', '=', 'true');
                })
                ->get();

            foreach ($sqlPg as $p) {
                $page = $p->user_page_id;
                array_push($pages, $page);
            }

//        dd($pages);
//            $request->attributes->add(['pages' => $pages]);
//
//            return $next($request);

            $view->with('pages', $pages);
        });
    }

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
