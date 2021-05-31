<?php

namespace Resume\classes\PostType;

class PostTypeActions
{
    public static function set()
    {
        add_action('admin_head-post.php', '\Resume\classes\PostType\PostType::hiddenPublishOptions');
        add_action('admin_head-post-new.php', '\Resume\classes\PostType\PostType::hiddenPublishOptions');

        add_action('init', '\Resume\classes\PostType\PostType::registerSkillsPostType');

        add_action('init', '\Resume\classes\PostType\PostType::registerWorksPostType');

        add_action('init', '\Resume\classes\PostType\PostType::registerProjectsPostType');
    }
}