<!-- works
  ================================================== -->
<section id="works" class="s-works target-section">

    <div class="row narrow section-intro has-bottom-sep">
        <div class="col-full">
            <h3>Portfolio</h3>
            <h1><?php /** @var TYPE_NAME $args */
                echo esc_html($args['portfolio_works_title']) ?></h1>

            <p class="lead"><?php echo esc_html($args['portfolio_works_text']) ?></p>
        </div>
    </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <?php $projects = get_posts([
                'numberposts' => -1,
                'post_type' => 'projects',
                'orderby'   => 'menu_order',
                'order'     => 'asc'
            ]); ?>

            <?php foreach ($projects as $project) : ?>
                <div class="masonry__brick">
                    <div class="item-folio">
                        <?php $projectTools = get_post_meta($project->ID, '_project_tools_field', true) ?>
                        <?php $projectLink = get_post_meta($project->ID, '_project_link_field', true) ?>
                        <div class="item-folio__thumb">
                            <?php $projectImageUrl = wp_get_attachment_url(get_post_thumbnail_id($project->ID), 'thumbnail') ?>
                            <a href="<?php echo esc_url($projectImageUrl) ?>" class="thumb-link" title="<?php echo esc_attr($project->post_title) ?>" data-size="1050x700">
                                <img src="<?php echo esc_url($projectImageUrl) ?>" alt="<?php echo esc_attr($project->post_title) ?>">
                                <span class="shadow-overlay"></span>
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                <?php echo esc_html($project->post_title) ?>
                            </h3>
                            <p class="item-folio__cat">
                                <?php echo esc_html($projectTools) ?>
                            </p>
                        </div>

                        <div class="item-folio__caption">
                            <a target="_blank" href="<?php echo esc_url($projectLink) ?>">GO TO PROJECT</a>
                        </div>

                    </div> <!-- end item-folio -->
                </div> <!-- end masonry__brick -->
            <?php endforeach; ?>


        </div>
    </div> <!-- end masonry -->

</section>
<!-- end works -->