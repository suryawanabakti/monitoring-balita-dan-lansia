<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use App\Filament\Pages\LaporanBalita;
use App\Filament\Pages\LaporanLansia;
use App\Http\Middleware\RedirectIfNotPimpinan;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class PimpinanPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pimpinan')
            ->path('pimpinan')

            ->colors([
                'primary' => Color::Teal,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Pimpinan/Resources'), for: 'App\\Filament\\Pimpinan\\Resources')
            ->discoverPages(in: app_path('Filament/Pimpinan/Pages'), for: 'App\\Filament\\Pimpinan\\Pages')
            ->pages([
                Pages\Dashboard::class,
                LaporanBalita::class,
                LaporanLansia::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Pimpinan/Widgets'), for: 'App\\Filament\\Pimpinan\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->plugins([
                FilamentEditProfilePlugin::make()
                    ->slug('my-profile')
                    ->setNavigationLabel('My Profile')
                    ->setNavigationGroup('Setting')
                    ->shouldShowDeleteAccountForm(false)

                    ->shouldShowAvatarForm(
                        value: true,
                        directory: 'avatars', // image will be stored in 'storage/app/public/avatars
                        rules: 'mimes:jpeg,png|max:1024' //only accept jpeg and png files with a maximum size of 1MB
                    )
                    // ->canAccess(fn () => auth()->user()->id === 1)
                    ->setTitle('my-profile')
                    ->setIcon('heroicon-o-user')
                    ->setSort(8)
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
            ->authMiddleware([
                Authenticate::class,
                RedirectIfNotPimpinan::class
            ]);
    }
}
