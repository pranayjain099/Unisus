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

