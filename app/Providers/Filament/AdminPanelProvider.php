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
use Devonab\FilamentEasyFooter\EasyFooterPlugin;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Redirect;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->brandLogo(fn () => view('vendor.filament.components.brand'))
            ->darkModeBrandLogo(fn () => view('vendor.filament.components.brand-dark'))
            ->favicon(asset('img/game-persona-logo.svg'))
            //->brandName('Game Persona')
            //->darkModeBrandLogo(asset('GamePersonaLight.png'))
            //->brandLogoHeight('40px')
            ->id('admin')
            ->path('admin')
//          ->login
            ->colors([
                'primary'       => Color::hex('#bc69fc'),
                'filantropo'    => Color::hex('#25bb48'),
                'socializador'  => Color::hex('#72a3c6'),
                'espirito-livre'=> Color::hex('#83e5c4'),
                'conquistador'  => Color::hex('#ffdd29'),
                'disruptor'     => Color::hex('#8d3153'),
                'jogador'       => Color::hex('#6d49b5'),
                'assassino'     => Color::hex('#c73d3d'),
                'explorador'    => Color::hex('#ce733c'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            // ->pages([
            //     \App\Filament\Pages\Bartle::class,
            //     \App\Filament\Pages\Dashboard::class,
            //     \App\Filament\Pages\GuiaDoAdmin::class,
            //     \App\Filament\Pages\GuiadoProfessor::class,
            //     \App\Filament\Pages\hexad::class,
            // ])
            ->widgets([
                \App\Filament\Widgets\TeacherGuideAlert::class,
                \App\Filament\Widgets\AccountOverview::class,
                \App\Filament\Widgets\UserChartWidget::class,
                \App\Filament\Widgets\LastestVerifyEmployers::class,
                \App\Filament\Widgets\AdvancedChartTurmas::class,
                \App\Filament\Widgets\LastestTestSubmit::class,
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
            ->defaultThemeMode(ThemeMode::Dark)
            ->plugins([
                EasyFooterPlugin::make()
                    ->withFooterPosition('footer')
                    ->withBorder()
                    //->withGithub(showLogo: false, showUrl: true)
                    ->withLogo(
                        asset('img/game-persona-logo.svg'), // 'https://laravel.com/img/laravel-logo.png',
                        '/',
                        null, // 'Powered by Laravel',                                // Text to display (optional)
                        28 // tamanho do logo
                    )
                    ->withLoadTime()
                    ->withLinks([
                        //['title' => 'Termo de Consentimento de Dados', 'url' => 'https://example.com/privacy-policy'],
                        ['title' => 'Políticas de Privacidade', 'url' => '/admin/suporte'],
                    ]),
            ]);
    }
}