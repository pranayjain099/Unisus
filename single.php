<?php

/**
 * Single template for all post pages
 * @package Unisus
 */

get_header();
?>

<div id="primary" style="text-align: center;">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <!-- extracting post -->
                    <div class="post-wrap">
                        <?php
                        if (have_posts()):  // checks if the post is there or not 
                            ?>
                            <div class="container">
                                <!-- getting the title of the page -->
                                <?php
                                if (is_home() && !is_front_page()) {
                                    ?>
                                    <header class="mb-5">
                                        <h1 class="page-title"> <!--screen-reader-text-->
                                            <?php single_post_title(); ?> <!-- to get the title of the blog -->

                                        </h1>
                                    </header>
                                    <?php
                                }
                                ?>
                                <?php
                                // loop starts here 
                                while (have_posts()):
                                    the_post();

                                    get_template_part('template-parts/content');

                                endwhile;
                                ?>
                            </div>
                            <?php
                        else:
                            get_template_part('template-parts/content-none');
                        endif;
                        ?>
                        <!-- previous and next method -->
                        <div class="prev-links">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="next-links">
                            <?php next_post_link(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <!-- calling sidebar -->
                    <div>
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();
?>