<?php

namespace App\Providers\Filament;

use App\Http\Middleware\RedirectIfNotWali;
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

class WaliPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('wali')
            ->renderHook('panels::body.start', fn() => '<style>
            /* HEADER / TOPBAR */
            .fi-topbar > nav {
                background: linear-gradient(90deg, #0f766e, #14b8a6) !important; /* teal-700 to teal-400 */
                color: white !important;
            }
    
           
    
            /* SIDEBAR */
            /* === SIDEBAR === */
        .fi-sidebar {
            background-color: #ffffff !important;
            color: #334155 !important; /* slate-700 */
            border-right: 1px solid #e5e7eb;
        }

        .fi-sidebar-item {
            color: #334155 !important; /* slate-700 */
            fill: #334155 !important;
            transition: all 0.2s ease-in-out;
            border-left: 4px solid transparent;
        }

        .fi-sidebar-item:hover {
            background-color: #f0fdfa !important; /* teal-50 */
            color: #0f766e !important; /* teal-700 */
            fill: #0f766e !important;
            border-left: 4px solid #0f766e;
        }

        .fi-sidebar-item-active {
            background-color: #ccfbf1 !important; /* teal-100 */
            color: #0f766e !important;
            fill: #0f766e !important;
            border-left: 4px solid #0f766e;
        }
        
        </style>')
            ->path('wali')
            ->colors([
                'primary' => Color::Teal,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->font('Poppins')
            ->darkMode(false)
            ->discoverResources(in: app_path('Filament/Wali/Resources'), for: 'App\\Filament\\Wali\\Resources')
            ->discoverPages(in: app_path('Filament/Wali/Pages'), for: 'App\\Filament\\Wali\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Wali/Widgets'), for: 'App\\Filament\\Wali\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
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
                RedirectIfNotWali::class
            ]);
    }
}
