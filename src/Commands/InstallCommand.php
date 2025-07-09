<?php

namespace Med\SiteSettings\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'site-settings:install';
    protected $description = 'Setup the Site Settings plugin';

    public function handle(): int
    {
        $this->info('🔧 Installing Filament Site Settings...');

        $this->call('vendor:publish', [
            '--tag' => 'site-settings-translations',
            '--force' => true,
        ]);

        $this->call('settings:discover');

        $this->info('✅ Translations published.');
        $this->info('✅ Settings class discovered.');

        $this->info('📌 Please make sure to register the SettingsPage manually in your AdminPanelProvider:');
        $this->line("use Med\SiteSettings\Pages\SettingsPage;");
        $this->line("->pages([ SettingsPage::class ])");

        $this->info('🎉 Site Settings plugin installed!');
        return static::SUCCESS;
    }
}
