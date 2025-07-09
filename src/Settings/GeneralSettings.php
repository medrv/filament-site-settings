<?php

namespace Med\SiteSettings\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $site_url;
    public string $logo_light;
    public string $logo_dark;
    public string $favicon;
    public bool $dark_mode;
    public string $mail_host;
    public string $mail_port;
    public string $mail_username;
    public string $mail_password;
    public string $mail_from;

    public static function group(): string
    {
        return 'general';
    }
}
