<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\View;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Auth\Login;
use App\Filament\Pages\LaporanBalita;
use App\Filament\Pages\LaporanLansia;
use App\Http\Middleware\RedirectIfNotAdmin;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->passwordReset()

            ->login(Login::class)
            ->registration()
            ->colors([
                'primary' => Color::Teal,
                'danger' => Color::Rose,
                'gray' => Color::Slate,
                'info' => Color::Sky,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
                LaporanBalita::class,
                LaporanLansia::class
            ])
            // ->brandLogo(fn() => view('filament.components.logo'))
            ->brandLogoHeight('3rem')
            ->brandName('Puskesmas Batusura')
            // ->favicon(asset('logo.jpg'))
            ->font('Poppins')
            ->darkMode(false)
            ->navigationGroups([
                'Dashboard',
                'Reports',
                'Management',
                'Setting',
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Settings')
                    ->url('/admin/my-profile')
                    ->icon('heroicon-o-cog-6-tooth')
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
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
                        directory: 'avatars',
                        rules: 'mimes:jpeg,png|max:1024'
                    )
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
            ->authMiddleware([
                Authenticate::class,
                RedirectIfNotAdmin::class
            ]);
    }
}
