<?php

namespace Resume\classes\NavMenus;

class NavMenusActions
{

    public static function set()
    {
        add_action('init', '\Resume\classes\NavMenus\NavMenus::addSocialMediaMenu');
        add_filter('wp_edit_nav_menu_walker', '\Resume\classes\NavMenus\NavMenus::filterNavMenu', 10, 2);
        add_action('wp_update_nav_menu_item', '\Resume\classes\NavMenus\NavMenus::saveSocialMediaFields', 10, 2);
    }
}