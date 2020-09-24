<?php

namespace App\Providers;

use DB;
use App\product;
use App\userTable;
use App\Pengiriman;
use App\Transaction_detail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
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
        //Format Mata Uang
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });
        ////////////////

        //Home-Master Administrator
        view()->composer(['*'], function ($view) {
            $AllCount          = DB::table('users')->count();
            $view->with('user',$AllCount);
        });

        view()->composer(['*'], function ($view) {
            $AllCount          = DB::table('product')->count();
            $view->with('products',$AllCount);
        });

        view()->composer(['*'], function ($view) {
            $AllCount          = DB::table('transaction_detail')->count();
            $view->with('transaction',$AllCount);
        });
        
        view()->composer(['*'], function ($view) {
            $AllCount          = DB::table('pengiriman')->count();
            $view->with('pengiriman',$AllCount);
        });
        ///////////////////////////

        //Table Transaksi - admin pengirim
        view()->composer(['*'], function ($view) {
            $user              = session()->get("sessionKey");
            $TotalCount        = DB::table('transaction_detail')->where('status', 'success')->sum('amount');
            $view->with('total',$TotalCount);
        });
        //////////////////////////////////

        //Home-Admin Pengirim
        view()->composer(['*'], function ($view) {
            $status_new        = DB::table('pengiriman')->where('status_kirim', 1)->count();
            $view->with('status_new',$status_new);
        });

        view()->composer(['*'], function ($view) {
            $status_shipping        = DB::table('pengiriman')->where('status_kirim', 3)->count();
            $view->with('status_shipping',$status_shipping);
        });

        view()->composer(['*'], function ($view) {
            $status_done        = DB::table('pengiriman')->where('status_kirim', 4)->count();
            $view->with('status_done',$status_done);
        });
        ///////////////////////////

        //Home-Admin Barang
        view()->composer(['*'], function ($view) {
            $status_active_product = DB::table('product')->where('status', 1)->count();
            $view->with('status_active_product',$status_active_product);
        });

        view()->composer(['*'], function ($view) {
            $status_nonact_product = DB::table('product')->where('status', 0)->count();
            $view->with('status_nonact_product',$status_nonact_product);
        });
        ///////////////////

    }
}
