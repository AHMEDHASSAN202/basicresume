<?php

namespace Resume\classes\Menus;

class MenusActions
{

    public static function set()
    {
        add_action('admin_menu', '\Resume\classes\Menus\Menus::settingsMenu');
        add_action('admin_menu', '\Resume\classes\Menus\Menus::addSubmenusSettings');
    }
}