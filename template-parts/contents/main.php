<?php

$options = get_option('portfolio_options', settingsDefaultOptions());

get_template_part('template-parts/contents/home', 'section', $options);

get_template_part('template-parts/contents/about', 'section', $options);

get_template_part('template-parts/contents/works', 'section', $options);

get_template_part('template-parts/contents/contact', 'section', $options);

?>