<?php

namespace Resume\classes\PostType;

use Resume\includes\Helpers;

class PostType
{
    public static function hiddenPublishOptions()
    {
        global $post;
        if (in_array($post->post_type, ['skills', 'works', 'projects'])) {
            echo '
                    <style type="text/css">
                        .misc-pub-visibility,
                        .misc-pub-curtime,
                         #edit-slug-box,
                         #message > p > a {
                             display:none;
                         }
                         #excerpt {
                            height: 6em;
                         }  
                    </style>
                ';
        }
    }

    public static function registerSkillsPostType()
    {
        register_post_type(
            'skills',
            [
                'labels'        => [
                    'name' => 'Skills',
                    'singular_name' => 'Skill',
                    'add_new' => 'Add New Skill',
                    'add_new_item' => 'Add New Skill',
                    'edit_item' => 'Edit Skill',
                    'new_item' => 'New Skill',
                    'all_items' => 'All Skills',
                    'view_item' => 'View Skill',
                    'search_items' => 'Search Skills',
                    'not_found' => 'No skills found',
                    'not_found_in_trash' => 'No skills found in Trash',
                    'menu_name' => 'Portfolio Skills',
                    'attributes' => 'Skills Attributes'
                ],
                'description'   => 'Portfolio Resume Skills',
                'public'        => true,
                'rewrite'       => [
                    'slug' => 'skills'
                ],
                'supports'      => [
                    'title', 'page-attributes'
                ],
                'menu_icon' => 'dashicons-media-code',
                'menu_position' => 5,
            ]
        );
    }

    public static function registerWorksPostType()
    {
        register_post_type(
            'works',
            [
                'labels'        => [
                    'name' => 'Work Experiences',
                    'singular_name' => 'Work Experience',
                    'add_new' => 'Add New Work',
                    'add_new_item' => 'Add New Work',
                    'edit_item' => 'Edit Work',
                    'new_item' => 'New Work',
                    'all_items' => 'All Works',
                    'view_item' => 'View Work',
                    'search_items' => 'Search Works',
                    'not_found' => 'No works found',
                    'not_found_in_trash' => 'No works found in Trash',
                    'menu_name' => 'Portfolio Works',
                ],
                'description'   => 'Portfolio Resume Work Experiences',
                'public'        => true,
                'rewrite'       => [
                    'slug' => 'works'
                ],
                'supports'      => [
                        'title', 'excerpt'
                ],
                'menu_icon' => 'dashicons-chart-line',
                'menu_position' => 5,
            ]
        );
    }

    public static function registerProjectsPostType()
    {
        register_post_type(
            'projects',
            [
                'labels'        => [
                    'name' => 'Projects',
                    'singular_name' => 'Project',
                    'add_new' => 'Add New Project',
                    'add_new_item' => 'Add New Project',
                    'edit_item' => 'Edit Project',
                    'new_item' => 'New Project',
                    'all_items' => 'All Projects',
                    'view_item' => 'View Project',
                    'search_items' => 'Search Projects',
                    'not_found' => 'No projects found',
                    'not_found_in_trash' => 'No projects found in Trash',
                    'menu_name' => 'Portfolio Projects',
                    'attributes' => 'Projects Attributes'
                ],
                'description'   => 'Portfolio Resume Projects',
                'public'        => true,
                'rewrite'       => [
                    'slug' => 'projects'
                ],
                'supports'      => [
                    'title', 'thumbnail', 'page-attributes'
                ],
                'menu_icon' => 'dashicons-hammer',
                'menu_position' => 5,
            ]
        );
    }
}