<?php
/**
 * template for entry content 
 * 
 * To be used inside wordpress The Loop
 * @package Unisus
 */

?>
<!-- Adding excerpt -->
<div class="entry-content" style="text-align:justify;">
    <?php
    /**
     * Check if user is in the single posts page or not if user is on single post page then show entire content else show the excerpt
     
     */

    if (is_single()) {
        the_content(
            sprintf(
                /**
                 * Used to filter out html tags
                 */
                wp_kses(
                    __("Continue reading %s <span class = 'meta-nav'>&rarr;</span>", "Unisus"),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),

                /**
                 * Fetches the title of the post
                 */
                the_title('<span class = "screen-text-reader">"', '"</span>', false)
            )

        );

    } else {
        // if you are in the blog page then show the excerpt
        Unisus_the_excerpt(100);

    }
    ?>
</div>