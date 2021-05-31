<!-- footer
 ================================================== -->
<?php $socialMenuItems = wp_get_nav_menu_items(get_nav_menu_locations()['social-media']) ?>
<footer>
    <div class="row">
        <div class="col-full">

            <ul class="footer-social">
                <?php foreach ($socialMenuItems as $item) : ?>
                    <?php $icon = get_post_meta($item->ID, '_menu_item_icon', true); ?>
                    <li><a href="<?php echo esc_url($item->url) ?>">
                            <i class="im <?php echo esc_attr($icon) ?>" aria-hidden="true"></i>
                            <span><?php echo esc_html($item->post_title) ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

    <div class="row footer-bottom">

        <div class="col-twelve">
            <div class="copyright">
                <span>© Copyright <a href="#">AHMED HASSAN</a> <?php echo date('Y') ?></span>
            </div>

            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="im im-arrow-up" aria-hidden="true"></i></a>
            </div>
        </div>

    </div> <!-- end footer-bottom -->

</footer> <!-- end footer -->