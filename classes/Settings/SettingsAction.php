<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace Resume\classes\Settings;


class SettingsAction
{
    public static function set()
    {
        add_action('admin_init', '\Resume\classes\Settings\Settings::registerSettings');
//        add_action('admin_init', 'Resume\classes\Settings\Settings::registerMainSection');
//        add_action('admin_init', 'Resume\classes\Settings\Settings::registerFields');
    }
}