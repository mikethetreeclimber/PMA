<?php

namespace App\Providers;

use App\Models\Worksite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        Config::set([
            'adminlte.menu' => array_merge(
                array_merge(
                    [[
                        'text' => 'Dashboard',
                        'icon' => 'fas fa-fw fa-bolt',
                        'url' => "/"
                    ]],
                    collect(collect(Worksite::get('circuit_number'))
                        ->unique()
                        ->pluck('circuit_number')
                        ->toArray())
                        ->map(function ($circuit) {
                            return [
                                'text' => $circuit,
                                'icon' => 'fas fa-fw fa-bolt',
                                'url' => "circuits/$circuit"
                            ];
                        })->toArray()
                ),
                Config::get('adminlte.menu')
            ),
        ]);
        
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
