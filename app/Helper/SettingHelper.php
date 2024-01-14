<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SettingWebsite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingHelper
{
    public static function getSetting()
    {
        $settings = \App\Models\SettingWebsite::get()->first();
        return $settings;
    }

    public static function getRole()
    {
        $role = Auth::user()->getRoleNames()->first();
        return $role;
    }
}
