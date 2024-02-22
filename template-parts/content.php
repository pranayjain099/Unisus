<?php

// Content Template
// @package Unisus

?>

<article id="<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>

    <?php
    get_template_part('template-parts/components/blog/entry-header');
    get_template_part('template-parts/components/blog/entry-metar');
    get_template_part('template-parts/components/blog/entry-content');
    get_template_part('template-parts/components/blog/entry-footer');
    ?>

</article>