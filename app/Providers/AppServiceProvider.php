<?php

namespace App\Providers;

use App\Models\Worksite;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Config;
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
        Gate::define('import-data', function () {
            return auth()->user()->is_admin;
        });
    }

    /**
     * Bootstrap any application services.
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
    }
}
