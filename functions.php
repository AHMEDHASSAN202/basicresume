<?php
/**
 * Created by PhpStorm.
 * User: AHMED HASSAN
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

const ROOT_FILE = __FILE__;
const DOMAIN = 'basicresume';

require_once 'autoload.php';

//\Resume\includes\Route::add([
//    [
//        'regex' => '^contact-us',
//        'query' => 'index.php',
//        'controller'  => 'ContactUsController'
//    ]
//]);

function settingsDefaultOptions() {
    return [
        'portfolio_title_home'          => 'I am Your Name. I am a Full Stack Web Developer.',
        'portfolio_cv_file_home'        => '',
        'portfolio_about_more_title'    => 'More About Me',
        'portfolio_about_image'         => '',
        'portfolio_about_text'          => 'Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.',
        'portfolio_skills_text'         => 'Lorem ipsum Nisi officia Duis irure voluptate dolor commodo pariatur occaecat aliquip adipisicing voluptate Ut in qui ea sint occaecat in commodo in in in incididunt ut sunt in Ut Duis in ut ex qui anim cupidatat cupidatat ex in non dolore labore ea amet cillum ea qui dolor nisi sed velit mollit exercitation ex fugiat labore in deserunt culpa laborum culpa anim dolore laboris amet irure mollit proident velit fugiat aute ea elit magna consequat qui officia quis elit Duis dolor esse cupidatat tempor proident voluptate aliqua ex cupidatat do eiusmod veniam irure laborum ut magna nostrud dolore ullamco commodo elit sit magna aliqua laborum veniam officia dolor.',
        'portfolio_works_title'         => 'See My Latest Projects.',
        'portfolio_works_text'          => 'Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.',
        'portfolio_contact_title'       => 'Say Hello.',
        'portfolio_contact_text'        => 'Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.',
        'portfolio_mobile'              => [''],
        'portfolio_email'               => [''],
        'portfolio_address'             => [''],
    ];
}

function settingsDefaultContactsOptions() {
    return [
        'portfolio_mobile'              => [''],
        'portfolio_email'               => [''],
        'portfolio_address'             => [''],
    ];
}

\Resume\includes\Load::stylesAndScripts();

\Resume\includes\Load::afterSetupTheme();

\Resume\includes\Load::loginPageThings();

\Resume\classes\NavMenus\NavMenusActions::set();
\Resume\classes\Metabox\MetaboxActions::set();
\Resume\classes\PostType\PostTypeActions::set();

if (is_admin()) {
    \Resume\includes\Load::things();
    \Resume\classes\Menus\MenusActions::set();
    \Resume\classes\Settings\SettingsAction::set();
}