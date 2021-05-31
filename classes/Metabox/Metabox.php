<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace Resume\classes\Metabox;


use Resume\includes\Helpers;

class Metabox
{
    public static function addMetaBoxesForSkills()
    {
        add_meta_box('progress_percent', 'Progress Percent Skill', function ($post) {
            \Resume\includes\Helpers::viewRequire('inputs/progress_percent', $post);
        }, ['skills']);
    }

    public static function saveMetaBoxesForSkills($postId)
    {
        if (!isset($_POST['post_type'])) {
            return $postId;
        }

        if ($_POST['post_type'] != 'skills') {
            return $postId;
        }

        if (!isset($_POST['progress_percent_nonce'])) {
            return $postId;
        }

        if (!wp_verify_nonce($_POST['progress_percent_nonce'], 'progress_percent')) {
            return $postId;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postId;
        }

        if (!current_user_can('edit_post')) {
            return $postId;
        }

        if (!empty($_POST['progress_percent'])) {
            update_post_meta($postId, '_progress_percent_field', sanitize_text_field($_POST['progress_percent']));
        }
    }

    public static function renameExcerptLabel($translation, $original) {
        global $post;
        if ('Excerpt' == $original) {
            return $post->post_type == 'works' ? 'Description'  : $original;
        } elseif ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
            return $post->post_type == 'works' ? '' : $original;
        }
        return $translation;
    }

    public static function addMetaBoxesForWorks()
    {
        add_meta_box('work_metabox', 'Work Info', function ($post) {
            Helpers::viewRequire('inputs/work_metabox', $post);
        }, ['works']);
    }

    public static function moveMetaBox($post)
    {
        if ('works' == $post->post_type) {
            remove_meta_box( 'postexcerpt', 'works', 'normal' );
            add_meta_box(
                'postexcerpt', __( 'Excerpt' ), 'post_excerpt_meta_box', 'works', 'advanced',
                'low'
            );
        }

        if ('projects' == $post->post_type) {
            remove_meta_box('pageparentdiv', 'projects', 'side');
            add_meta_box(
                'pageparentdiv', 'Projects Attributes', 'page_attributes_meta_box', 'projects', 'advanced',
                'low'
            );
        }
    }

    public static function saveMetaBoxesForWorks($postId)
    {
        if (!isset($_POST['post_type'])) {
            return $postId;
        }

        if ($_POST['post_type'] != 'works') {
            return $postId;
        }

        if (!isset($_POST['work_nonce'])) {
            return $postId;
        }

        if (!wp_verify_nonce($_POST['work_nonce'], 'update_work')) {
            return $postId;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postId;
        }

        if (!current_user_can('edit_post')) {
            return $postId;
        }

        if (!empty($_POST['_work_position_field'])) {
            update_post_meta($postId, '_work_position_field', sanitize_text_field($_POST['_work_position_field']));
        }

        if (!empty($_POST['_work_from_month_field']) AND !empty($_POST['_work_from_year_field'])) {
            $fromDate = mktime(0,0,0,$_POST['_work_from_month_field'], 1, $_POST['_work_from_year_field']);
            if ($fromDate) {
                update_post_meta($postId, '_work_from_field', $fromDate);
            }
        }

        if (!empty($_POST['_work_to_month_field']) AND !empty($_POST['_work_to_year_field'])) {
            $toDate = mktime(0,0,0,$_POST['_work_to_month_field'], 1, $_POST['_work_to_year_field']);
            if ($toDate) {
                update_post_meta($postId, '_work_to_field', $toDate);
            }
        }

        if (!empty($_POST['_work_present_field'])) {
            update_post_meta($postId, '_work_present_field', (int)sanitize_text_field($_POST['_work_present_field']));
        }
    }

    public static function addMetaBoxesForProjects()
    {
        add_meta_box('project_metabox', 'Project Info', function ($post) {
            Helpers::viewRequire('inputs/project_metabox', $post);
        }, ['projects']);
    }

    public static function saveMetaBoxesForProjects($postId)
    {
        if (!isset($_POST['post_type'])) {
            return $postId;
        }

        if ($_POST['post_type'] != 'projects') {
            return $postId;
        }

        if (!isset($_POST['project_nonce'])) {
            return $postId;
        }

        if (!wp_verify_nonce($_POST['project_nonce'], 'update_project')) {
            return $postId;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postId;
        }

        if (!current_user_can('edit_post')) {
            return $postId;
        }

        if (!empty($_POST['_project_tools_field'])) {
            update_post_meta($postId, '_project_tools_field', sanitize_text_field($_POST['_project_tools_field']));
        }

        if (!empty($_POST['_project_link_field'])) {
            update_post_meta($postId, '_project_link_field', esc_url_raw($_POST['_project_link_field']));
        }
    }
}