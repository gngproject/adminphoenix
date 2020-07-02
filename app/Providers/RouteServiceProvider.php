<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdmin_MasterRoutes();

        $this->mapAdmin_BarangRoutes();

        $this->mapAdmin_PengirimanRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin_master" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdmin_MasterRoutes()
    {
        Route::middleware('web', 'auth', 'role:admin_master')
            ->prefix('admin_master')
            ->name('adminmaster.')
            ->namespace($this->namespace. '\AdminMaster')
            ->group(base_path('routes/admin_master.php'));
    }

    protected function mapAdmin_BarangRoutes()
    {
        Route::middleware('web', 'auth', 'role:admin_barang')
            ->prefix('admin_barang')
            ->name('adminbarang.')
            ->namespace($this->namespace. '\AdminBarang')
            ->group(base_path('routes/admin_barang.php'));
    }

    protected function mapAdmin_PengirimanRoutes()
    {
        Route::middleware('web', 'auth', 'role:admin_pengiriman')
            ->prefix('admin_pengiriman')
            ->name('adminpengirim.')
            ->namespace($this->namespace. '\AdminPengirim')
            ->group(base_path('routes/admin_pengiriman.php'));
    }
}
