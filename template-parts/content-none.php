<?php

// The Template part for displaying a message that posts cannot be found
// @package unisus
?>

<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title">
            <?php esc_html_e('Nothing found', 'Unisus') ?>
        </h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) {
            ?>
            <p>
                <?php
                printf(
                    wp_kses(
                        __('Ready to publish your first post ? <a href = "%s">Get Started here</a>', 'Unisus'),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                    ),
                    esc_url(admin_url('post-new.php'))
                )
                    ?>
            </p>
            <?php

        }
        // if user is not logged-in 
        elseif (is_search()) {
            ?>
            <p>
                <?php esc_html_e('Sorry but nothing matched your search item , Please try again with some different keywords', 'Unisus') ?>
            </p>
            <?php
            get_search_form();
        } else {
            ?>
            <p>
                <?php esc_html_e('It seems that we cannot find what you are looking for. Perhaps search can help', 'Unisus') ?>
            </p>
            <?php
            get_search_form();
        }
        ?>
    </div>
</section>