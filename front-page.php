<?php
// Front Page 
// @package Unisus

get_header();
?>

<div id="primary" style="text-align: center;">
    <main id="main" class="site-main mt-5" role="main">
        <div class="home-page-wrap">
            <?php
            if (have_posts()):  // checks if the post is there or not 
                // loop starts here 
                while (have_posts()):
                    the_post();

                    get_template_part('template-parts/content', 'page');

                endwhile;
                ?>
                <?php
            else:
                get_template_part('template-parts/content-none');
            endif;
            ?>
        </div>
    </main>
</div>

<?php
get_footer();
?>