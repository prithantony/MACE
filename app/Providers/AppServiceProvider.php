<?php

namespace App\Providers;

use App\Models\PortalLink;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settings = collect();
            $portalLinks = collect();

            if (Schema::hasTable('settings')) {
                $settings = Setting::pluck('value', 'key');
            }

            if (Schema::hasTable('portal_links')) {
                $portalLinks = PortalLink::where('is_active', true)->get();
            }

            $view->with('siteSettings', $settings);
            $view->with('sitePortalLinks', $portalLinks);
        });
    }
}
