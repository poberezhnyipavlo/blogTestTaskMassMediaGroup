<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->nameBrowser();
    }

    public function nameBrowser()
    {
        View::composer('layouts.partials.footer', function($view) {
            $agent = new Agent();
            $browser = $agent->browser();
            $view->with('name', $browser);
        });
    }
}
