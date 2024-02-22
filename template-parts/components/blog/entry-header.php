<?php
/**
 * Template for entry header
 * 
 */

$get_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($get_post_id);
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
                    $get_post_id,
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
    ?>
</header>