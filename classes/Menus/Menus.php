<?php

namespace Resume\classes\Menus;

use Resume\includes\Helpers;

class Menus
{
    public static function settingsMenu()
    {
        add_menu_page(
            'Portfolio Info',
            'Portfolio Info',
            'manage_options',
            'portfolio',
            function ($args) {
                Helpers::viewRequire('PortfolioView', $args);
            },
            'dashicons-media-document',
            5
        );
    }

    public static function addSubmenusSettings()
    {
        add_submenu_page(
            'portfolio',
            'Portfolio Contact',
            'Portfolio Contact',
            'manage_options',
            'portfolio-contact',
            function ($args) {
                Helpers::viewRequire('PortfolioContactView', $args);
            }
        );
    }
}