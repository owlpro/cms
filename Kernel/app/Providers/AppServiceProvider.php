<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        // require helpers
        $this->registerHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //$this->setPermissionLogs();
    }

    private function registerHelpers() {
        foreach (glob(app_path() . "/Helpers/*.php") as $helper) {
            require_once $helper;
        }
    }

    private function setPermissionLogs() {
        //dd(base_path('storage/logs'));
        File::chmod(base_path('storage/logs'), 777);
    }
}
