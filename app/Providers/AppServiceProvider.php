<?php

namespace App\Providers;

use DB;
use App\product;
use App\userTable;
use App\midpayment;
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
            $AllCount          = DB::table('users_table')->count();
            $view->with('user',$AllCount);
        });

        view()->composer(['*'], function ($view) {
            $AllCount          = DB::table('product')->count();
            $view->with('products',$AllCount);
        });

        view()->composer(['*'], function ($view) {
            $AllCount          = DB::table('midpayments')->count();
            $view->with('transaction',$AllCount);
        });
        ///////////////////////////

        //Table Transaksi - admin pengirim
        view()->composer(['*'], function ($view) {
            $user              = session()->get("sessionKey");
            $TotalCount        = DB::table('midpayments')->where('status', 'success')->sum('newtotal');
            $view->with('total',$TotalCount);
        });
        //////////////////////////////////

        //Home-Admin Pengirim
        view()->composer(['*'], function ($view) {
            $status_new        = DB::table('midpayments')->where('status_kirim', 1)->count();
            $view->with('status_new',$status_new);
        });

        view()->composer(['*'], function ($view) {
            $status_shipping        = DB::table('midpayments')->where('status_kirim', 3)->count();
            $view->with('status_shipping',$status_shipping);
        });

        view()->composer(['*'], function ($view) {
            $status_done        = DB::table('midpayments')->where('status_kirim', 4)->count();
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
