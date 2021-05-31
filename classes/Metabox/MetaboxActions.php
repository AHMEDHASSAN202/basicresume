<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace Resume\classes\Metabox;


class MetaboxActions
{
    public static function set()
    {
        add_action('add_meta_boxes', '\Resume\classes\Metabox\Metabox::addMetaBoxesForSkills');
        add_action('save_post', '\Resume\classes\Metabox\Metabox::saveMetaBoxesForSkills');

        add_filter('gettext', '\Resume\classes\Metabox\Metabox::renameExcerptLabel', 10, 2);
        add_action('edit_form_after_title', '\Resume\classes\Metabox\Metabox::moveMetaBox');

        add_action('add_meta_boxes', '\Resume\classes\Metabox\Metabox::addMetaBoxesForWorks');
        add_action('save_post', '\Resume\classes\Metabox\Metabox::saveMetaBoxesForWorks');

        add_action('add_meta_boxes', '\Resume\classes\Metabox\Metabox::addMetaBoxesForProjects');
        add_action('save_post', '\Resume\classes\Metabox\Metabox::saveMetaBoxesForProjects');
    }
}