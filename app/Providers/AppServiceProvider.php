<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import the View facade


use App\Models\Feature;
use App\Models\Hero;
use App\Models\Libraries;
use App\Models\LinkSocialMedia;

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
        $linkSocials = LinkSocialMedia::all();
        View::share([
            'linkSocials' => $linkSocials,
        ]);
    }
}