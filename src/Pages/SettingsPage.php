<?php

namespace Med\SiteSettings\Pages;

use Filament\Pages\Page;
use Med\SiteSettings\Forms\SettingsForm;
use Spatie\LaravelSettings\Settings;
use Filament\Forms;
use Filament\Notifications\Notification;

class SettingsPage extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'site-settings::settings-page';
    protected static ?string $navigationLabel = 'إعدادات الموقع';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(app(\Med\SiteSettings\Settings\GeneralSettings::class)->toArray());
    }

    public function submit(): void
    {
        app(\Med\SiteSettings\Settings\GeneralSettings::class)->fill($this->form->getState())->save();

        Notification::make()
            ->title(__('site-settings::filament.save'))
            ->success()
            ->send();
    }

    protected function getFormSchema(): array
    {
        return SettingsForm::make()->schema();
    }
}
