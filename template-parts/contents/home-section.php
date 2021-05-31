<!-- home ================================================== -->
<section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="<?php echo get_theme_file_uri('images/hero-bg.jpg') ?>" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

    <div class="overlay"></div>
    <div class="shadow-overlay"></div>

    <div class="home-content">

        <div class="row home-content__main">

            <h3>Hello There</h3>

            <h1>
                <?php /** @var TYPE_NAME $args */
                echo @$args['portfolio_title_home']; ?>
            </h1>

            <div class="home-content__buttons">
                <a href="<?php echo esc_url($args['portfolio_cv_file_home']) ?>" target="_blank" class="btn btn--stroke">
                    Download My CV
                </a>
                <a href="#works" class="smoothscroll btn btn--stroke">
                    Latest Projects
                </a>
                <a href="#about" class="smoothscroll btn btn--stroke">
                    More About Me
                </a>
            </div>

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    <span>Scroll Down</span>
                </a>
            </div>

        </div>

    </div> <!-- end home-content -->
    <?php $socialMenuItems = wp_get_nav_menu_items(get_nav_menu_locations()['social-media']) ?>
    <ul class="home-social">
        <?php foreach ($socialMenuItems as $item) : ?>
        <?php $icon = get_post_meta($item->ID, '_menu_item_icon', true); ?>
            <li>
                <a href="<?php echo esc_url($item->url) ?>" target="_blank"><i class="<?php echo esc_attr($icon) ?>" aria-hidden="true"></i><span><?php echo esc_html($item->post_title) ?></span></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- end home-social -->

</section>
<!-- end s-home -->
