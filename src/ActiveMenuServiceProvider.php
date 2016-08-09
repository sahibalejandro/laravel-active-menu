<?php

namespace Sahib\ActiveMenu;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ActiveMenuServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sahib_active_menu', function () {
            return new ActiveMenu;
        });

        Blade::directive('activate', function ($expression) {
            return "<?php echo app('sahib_active_menu')->activate{$expression} ?>";
        });

        Blade::directive('active', function ($expression) {
            return "<?php echo app('sahib_active_menu')->active{$expression} ?>";
        });
    }
}
