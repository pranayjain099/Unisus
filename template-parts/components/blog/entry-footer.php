<?php

/**
 * Template for entry footer
 * 
 * To be used inside of wordpress The Loop
 * 
 * @package Unisus
 */

//getting the id
$the_post_id = get_the_ID();

//getting taxonomy terms
$article_terms = wp_get_post_terms($the_post_id, ['category', 'post_tag']);

//checks if the terms are empty or are do not go futher
if (empty($article_terms) || !is_array($article_terms)) {
    return;
}


?>

<!-- entry footer starts here  -->
<div class="entry-footer mt-4">
    <?php
    foreach ($article_terms as $key => $article_term) {
        ?>
        <!-- showing taxonomy term name in the button -->

        <a class="entry-footer-link text-black-50" href="<?php echo esc_url(get_term_link($article_term)) ?>">
            <button class="btn border border-secondary mb-2 mr-2">
                <?php echo esc_html($article_term->name); ?>
            </button>
        </a>
        <?php
    }
    ?>
</div>