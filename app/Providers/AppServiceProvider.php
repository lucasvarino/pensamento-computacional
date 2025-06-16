<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Css;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::unguard();

        $buildPath    = public_path('build');
        $manifestPath = $buildPath . '/manifest.json';

        if (File::exists($manifestPath)) {
            $manifest = json_decode(File::get($manifestPath), true);

            $cssFile = $manifest['resources/css/app.css']['file'] 
                ?? 'assets/app.css';

            FilamentAsset::register([
                Css::make('app', "{$buildPath}/{$cssFile}"),
            ]);
        }

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
