<?php
/**
 * Template for entry header
 * 
 */

$the_post_id = get_the_ID();
$hide_title = get_post_meta($the_post_id, '_hide_page_title', true);
//fetching the hide class
$hiding_class = !empty($hide_title) && 'yes' == $hide_title ? 'hide' : '';
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<header class="entry-header">
    <?php
    //display featured image
    if ($has_post_thumbnail) {
        ?>
        <div class="entry-image">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php
                the_post_custom_thumbnail(
                    $the_post_id,
                    'featured-thumbnail',
                    [
                        'sizes' => '(max-width:350px) 350px , 233px',
                        'class' => 'attachment-featured-large size-featured-image'
                    ]
                ) ?>
            </a>
        </div>
        <?php
    }

    //getting title in the blog page and post page
    
    if (is_single() || is_page()) {
        //In the post page
        printf(
            '<h1 class = "page-title text-dark %1$s">%2$s</h1>',
            esc_attr($heading_class),
            wp_kses_post(get_the_title())
        );
    } else {
        printf(
            '<h2 class = "entry-title mb-3 mt-3" style = "text-align:center; font-weight:500;"><a href = "%1$s" class = "text-dark">%2$s</a>',
            esc_url(get_the_permalink()),
            wp_kses_post(get_the_title())
        );
    }
    ?>
</header>