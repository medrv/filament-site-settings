<?php

namespace Med\SiteSettings;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class SiteSettingsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/site-settings.php', 'site-settings');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            \$this->commands([
                \Med\SiteSettings\Commands\InstallCommand::class,
            ]);
        }
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'site-settings');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'site-settings');
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/site-settings'),
        ], 'site-settings-translations');
    }
}
