<?php
/**
 * Custom functions
 * 
 * @package Unisus
 */

// Returns the custom thumbnail
function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{

    $custom_thumbnail = '';

    //if the id is null
    if (null === $post_id) {
        $post_id = get_the_ID();
    }

    //if the id is present  
    if (has_post_thumbnail($post_id)) {
        $default_atttribute = [
            'loading' => 'lazy'
        ];
    }

    $attributes = array_merge($additional_attributes, $default_atttribute);

    $custom_thumbnail = wp_get_attachment_image(

        get_post_thumbnail_id($post_id),
        $size,
        false,
        $attributes
    );

    return $custom_thumbnail;

}

// echo the custom thumbnail
function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function Unisus_posted_on()
{
    $time_string = '<time class = "entry-date published updated" datetime = "%1$s"> %2$s </time>';

    // if post is modified
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class = "entry-date published" datetime = "%1$s"> %2$s</time><time class = "updated" datetime = "%3$s"> %4$s </time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date()),
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'Unisus'),
        '<a href = "' . esc_url(get_permalink()) . '" rel = "bookmark">' . $time_string . '</a>'
    );

    echo '<span class = "posted-on text-secondary">' . $posted_on . '</span>';
}

function Unisus_posted_by()
{
    $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'Unisus'),
        '<span class = "author vcard"><a href = "' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class = "byline text-secondary">' . $byline . '</span>';
}

//function to cut down the excerpt character
function Unisus_the_excerpt($trim_character_count = 0)
{
    // If post doesn't have excerpt or trim character count is 0 then simply use the_excerpt()

    if (!has_excerpt() || 0 == $trim_character_count) {
        the_excerpt();
        return;
    }

    // if the excerpt is available or user has passed character count

    // remove all the unnecessary html tags and get the excerpt
    $excerpt = wp_strip_all_tags(get_the_excerpt());

    // start from index 0 and go till charcter count and trim rest of it (if trim count is 250 then $excerpt will contain  250 words from start).
    $excerpt = substr($excerpt, 0, $trim_character_count);

    // remove the last word as if you set count to 200 and till last word is hello and till hel 200 words are completed then it won't look good.
    $excerpt = substr($excerpt, 0, strrpos($excerpt, " "));

    echo $excerpt . "[...]";
}

//function to add read more in excerpt
function Unisus_read_more($more = '')
{
    //checks if the page is blog page or not
    if (!is_single()) {
        ?>
        <?php
        $more = sprintf(
            '<div class="read-more" style = "text-align:center;"><button class ="mt-4 btn btn-info"><a class = "Unisus-read-more text-white" href = "%1$s">%2$s</a></button></div>',
            get_permalink(get_the_ID()),
            __('Read More', 'Unisus')
        );
    ?>
    <?php
    }

    return $more;
}

function Unisus_pagination()
{
    $allowed_html = [
        'span' => [
            'class' => []
        ],

        'a' => [
            'class' => [],
            'href' => []
        ]
    ];

    $args = [
        'before_page_number' => '<span class = "btn border border-secondary mr-2 mb-2">',
        'after_page_number' => '</span>'
    ];

    printf('<nav class = "Unisus-pagination clearfix">%s</nav>', wp_kses(paginate_links($args), $allowed_html));
}
