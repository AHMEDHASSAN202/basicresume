<!-- about
================================================== -->
<section id="about" class="s-about target-section">

    <div class="row narrow section-intro has-bottom-sep">
        <div class="col-full text-center">
            <h3>About</h3>
            <h1><?php /** @var TYPE_NAME $args */
                echo esc_html($args['portfolio_about_more_title']) ?></h1>
            <div class="about-img-container">
                <img class="about-img" src="<?php echo esc_url($args['portfolio_about_image']) ?>">
            </div>
            <p class="lead">
                <?php echo esc_html($args['portfolio_about_text']) ?>
            </p>
        </div>
    </div>

    <div class="row about-content">

        <div class="col-six tab-full left">
            <h3>Hi!</h3>
            <?php
                if (!empty($args['portfolio_skills_text'])) {
                    if (strpos($args['portfolio_skills_text'], '{br}') !== false) {
                        $skillsTextArray = explode('{br}', esc_html($args['portfolio_skills_text']));
                        echo '<ul class="skills-text">';
                        foreach ($skillsTextArray as $i) {
                            echo '<li>'. $i .'</li>';
                        }
                        echo '</ul>';
                    }else {
                        echo esc_html($args['portfolio_skills_text']);
                    }
                }
            ?>

        </div>

        <div class="col-six tab-full right">
            <h3>I've Got Some skills.</h3>

            <?php $skills = get_posts([
                'numberposts' => -1,
                'post_type' => 'skills',
                'orderby'   => 'menu_order',
                'order'     => 'asc'
            ]); ?>
            <ul class="skill-bars">
                <?php foreach ($skills as $skill) : ?>
                    <?php $percent = get_post_meta($skill->ID, '_progress_percent_field', true) ?>
                    <li>
                        <div class="progress percent<?php echo esc_attr($percent) ?>"><span><?php echo esc_html($percent) ?>%</span></div>
                        <strong><?php echo esc_html($skill->post_title) ?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div> <!-- end about-content -->

    <div class="row about-content about-content--timeline">

        <div class="col-full text-center">
            <h3>My Work Experience.</h3>
        </div>
        <?php $workExperiences = get_posts([
            'numberposts' => -1,
            'post_type' => 'works',
            'meta_key'  => '_work_from_field',
            'orderby'   => 'meta_value',
            'order'     => 'DESC'
        ]); ?>
        <?php $chunked = array_chunk($workExperiences, ceil((count($workExperiences) / 2))) ?>

        <?php foreach ($chunked as $key => $item) : ?>
            <div class="col-six tab-full <?php echo $key % 2 ? 'left' : 'right' ?>">
                <div class="timeline">
                    <?php foreach($item as $work) : ?>
                        <?php $position = get_post_meta($work->ID, '_work_position_field', true) ?>
                        <?php $fromDate = get_post_meta($work->ID, '_work_from_field', true) ?>
                        <?php $toDate = get_post_meta($work->ID, '_work_to_field', true) ?>
                        <?php $present = get_post_meta($work->ID, '_work_present_field', true) ?>
                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe"><?php echo date('F Y', $fromDate) ?> - <?php echo $present ? 'Present' : date('F Y', $toDate) ?></p>
                                <h3><?php echo esc_html($work->post_title) ?></h3>
                                <h5><?php echo esc_html($position) ?></h5>
                            </div>
                            <div class="timeline__desc">
                                <p><?php echo esc_html($work->post_excerpt) ?></p>
                            </div>
                        </div> <!-- end timeline__block -->
                    <?php endforeach; ?>
                </div> <!-- end timeline -->
            </div> <!-- end left -->
        <?php endforeach; ?>

    </div> <!-- end about-content timeline -->

</section>
<!-- end about -->
    