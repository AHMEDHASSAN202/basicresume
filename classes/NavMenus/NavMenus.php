<?php

namespace Resume\classes\NavMenus;

use Resume\includes\Helpers;

class NavMenus
{
    public static function addSocialMediaMenu()
    {
        register_nav_menus(['social-media' => 'Social Media']);
    }

    public static function filterNavMenu($class, $menu_id)
    {
        if ($menu_id === @get_nav_menu_locations()['social-media']) {
            add_action('wp_nav_menu_item_custom_fields', '\Resume\classes\NavMenus\NavMenus::addSocialMediaFields', 10, 2);
        }
        return $class;
    }

    public static function addSocialMediaFields($item_id, $menu_item)
    {
        $menu_item_logo = get_post_meta($item_id, '_menu_item_icon', true);

        Helpers::viewRequire('inputs/social_media_menu_icon', ['item_id' => $item_id, 'menu_item_logo' => $menu_item_logo]);
    }

    public static function saveSocialMediaFields($menu_id, $menu_item_db_id)
    {
        if (isset($_POST['_menu_item_icon'][$menu_item_db_id])) {
            $sanitized_data = sanitize_text_field( $_POST['_menu_item_icon'][$menu_item_db_id] );
            update_post_meta( $menu_item_db_id, '_menu_item_icon', $sanitized_data );
        } else {
            delete_post_meta( $menu_item_db_id, '_menu_item_icon' );
        }
    }
}