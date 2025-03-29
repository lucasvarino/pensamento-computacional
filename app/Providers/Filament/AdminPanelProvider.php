<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\AccountOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\Enums\ThemeMode;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Navigation\MenuItem;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->brandLogo(fn () => view('vendor.filament.components.brand'))
            ->darkModeBrandLogo(fn () => view('vendor.filament.components.brand-dark'))
            //->favicon(asset('Imagem_Guia_Redonda02.png'))
            //->brandName('Game Persona')
            //->darkModeBrandLogo(asset('GamePersonaLight.png'))
            //->brandLogoHeight('40px')
            ->default()
            ->id('admin')
            ->path('admin')
//          ->login
            ->colors([
                'primary' => Color::Amber,
                'purple' => Color::hex('#9333ea'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                \App\Filament\Widgets\AccountOverview::class,
                \App\Filament\Widgets\UserChartWidget::class,
                \App\Filament\Widgets\LastestVerifyEmployers::class,
                \App\Filament\Widgets\AdvancedChartTurmas::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->userMenuItems([
                'logout' => \Filament\Navigation\MenuItem::make()
                    ->label('Sair')
                    ->url(fn () => route('filament.auth.logout')),
            ])
            ->authMiddleware([
            //Authenticate::class,
            ])
            ->databaseNotifications()
            ->defaultThemeMode(ThemeMode::Dark);
    }
}