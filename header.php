<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

    <head>

        <!--- basic page needs
        ================================================== -->
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <title><?php bloginfo('name'); ?></title>

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo get_theme_file_uri('favicon.ico') ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo get_theme_file_uri('favicon.ico') ?>" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">

        <?php wp_head(); ?>

    </head>
    <body id="top" <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <?php get_template_part('template-parts/header/header', 'site') ?>