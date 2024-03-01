<?php

// Main file

get_header();
?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">

        <!-- extracting post -->
        <?php

        if (have_posts()):
            ?>
            <div class="container">
                <!-- getting the title of the page -->
                <?php
                if (is_home() && !is_front_page()) {
                    ?>
                    <header class="mb-5">
                        <h1 class="page-title screen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                }
                ?>
                <!-- adding grid -->

                <div class="row">
                    <?php
                    $index = 0;
                    $no_of_columns = 3;
                    while (have_posts()):
                        the_post();

                        //start div
                        if (0 === $index % $no_of_columns) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <?php
                        }

                        get_template_part('template-parts/content');

                        $index++;

                        // end the div
                        if (0 !== $index && 0 === $index % $no_of_columns) {
                            ?>
                            </div>
                            <?php
                        }
                    endwhile;
                    ?>
                </div>
            </div>
            <?php
        else:
            get_template_part('template-parts/content-none');
        endif;

        Unisus_pagination();

        ?>
    </main>
</div>

<?php
get_footer();
?>