<?php

namespace App\Tools;

class Config
{
    public function appName()
    {
        return env('APP_NAME', 'App');
    }

    public function appLang()
    {
        return env('APP_LANG', 'en');
    }
}
