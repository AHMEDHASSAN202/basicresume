<?php
/**
 * Created by PhpStorm.
 * User: AHMED HASSAN
 */

namespace Resume\includes;


class Load
{
    public static function things()
    {
        Load::adminThings();
        Load::addSrcMediaFileFilter();
    }

    private static function adminThings()
    {
        add_action( 'admin_enqueue_scripts', function () {
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
            wp_enqueue_style( 'dashboard-style', get_stylesheet_directory_uri() . '/css/dashboard.css' );
        });
    }

    public static function loginPageThings()
    {
        add_action('login_enqueue_scripts', function () {
            $loginTitle = get_bloginfo('name') . ' Dashboard';
            echo "
                <style>
                    .login h1 a {
                        display: none !important;
                    }
                    .login h1:before {
                        content: '$loginTitle';
                        color: #135E96
                    }
                </style>
            ";
        });
    }

    private static function addSrcMediaFileFilter()
    {
        add_filter('media_send_to_editor', function ($html, $send_id, $attachment){
            $attachment_url = wp_get_attachment_url($send_id);
            return $attachment_url;
        }, 10, 4);
    }

    public static function afterSetupTheme()
    {
        add_action('after_setup_theme', function () {
            add_theme_support('post-thumbnails');
        });
    }

    public static function stylesAndScripts()
    {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_style( 'style', get_stylesheet_uri() );
            wp_enqueue_style('basecss', get_template_directory_uri() . '/css/base.css');
            wp_enqueue_style('vendorcss', get_template_directory_uri() . '/css/vendor.css');
            wp_enqueue_style('iconmonstrcss', get_template_directory_uri() . '/css/iconic/css/iconmonstr-iconic-font.min.css');
            wp_enqueue_style('fontscss', get_template_directory_uri() . '/css/fonts.css');
            wp_enqueue_style('maincss', get_template_directory_uri() . '/css/main.css');

            wp_enqueue_script('modernizrjs', get_template_directory_uri() . '/plugins/modernizr.js');
            wp_enqueue_script('pacejs', get_template_directory_uri() . '/plugins/pace.min.js');
            wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/plugins/jquery-3.2.1.min.js', [], false, true);
            wp_enqueue_script('pluginsjs', get_template_directory_uri() . '/plugins/plugins.js', [], false, true);
            wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js', [], false, true);
        });
    }
}