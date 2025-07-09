<?php

namespace Med\SiteSettings\Forms;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;

class SettingsForm
{
    public static function make(): Forms\Form
    {
        return Forms\Form::make()->schema([
            TextInput::make('site_name')->label(__('site-settings::filament.site_name'))->required(),
            TextInput::make('site_url')->label(__('site-settings::filament.site_url'))->required()->url(),

            FileUpload::make('logo_light')
                ->label(__('site-settings::filament.logo_light'))
                ->directory('settings')
                ->image(),

            FileUpload::make('logo_dark')
                ->label(__('site-settings::filament.logo_dark'))
                ->directory('settings')
                ->image(),

            FileUpload::make('favicon')
                ->label(__('site-settings::filament.favicon'))
                ->directory('settings')
                ->image(),

            Toggle::make('dark_mode')
                ->label(__('site-settings::filament.dark_mode')),

            Forms\Components\Section::make(__('site-settings::filament.mail_settings'))
                ->schema([
                    TextInput::make('mail_host')
                        ->label(__('site-settings::filament.mail_host'))
                        ->prefixIcon('heroicon-o-server'),

                    TextInput::make('mail_port')
                        ->label(__('site-settings::filament.mail_port'))
                        ->numeric()
                        ->prefixIcon('heroicon-o-arrow-up'),

                    TextInput::make('mail_username')
                        ->label(__('site-settings::filament.mail_username'))
                        ->prefixIcon('heroicon-o-user'),

                    TextInput::make('mail_password')
                        ->label(__('site-settings::filament.mail_password'))
                        ->password()
                        ->revealable()
                        ->prefixIcon('heroicon-o-key'),

                    TextInput::make('mail_from')
                        ->label(__('site-settings::filament.mail_from'))
                        ->email()
                        ->prefixIcon('heroicon-o-envelope'),
                ]),
        ]);
    }
}
