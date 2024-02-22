<?php
/**
 * Meta boxes
 * @package Unisus
 */

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;

class Meta_Boxes
{
    use singleton;
    protected function __construct()
    {
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /*
         * Actions.
         */

        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action('save_post', [$this, 'save_post_meta_data']);
    }

    public function add_custom_meta_box()
    {
        $screens = ['post']; // in only post type screen it is available
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title', //unique id
                __('<p>Hide page title</p>', 'Unisus'), //Box title
                [$this, 'custom_meta_box_html'], //content callback
                'post', // Post type

            );
        }
    }

    public function custom_meta_box_html($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_title', true);
        ?>
        <!-- This is a label for the select box -->
        <label for="Unisus-field">
            <?php esc_html_e('Hide the page title', 'Unisus'); ?>
        </label>

        <select name="Unisus_field" id="Unisus-field" class="postbox">
            <!-- This is the default option with an empty value -->
            <option value="">
                <?php esc_html_e('Select', 'Unisus'); ?>
            </option>
            <!-- This is an option for 'Yes'. If the value of the custom field is 'yes', the 'selected' attribute is added. -->
            <option value="yes" <?php selected($value, 'yes'); ?>>
                <?php esc_html_e('Yes', 'Unisus'); ?>
            </option>
            <!-- This is an option for 'No'. If the value of the custom field is 'no', the 'selected' attribute is added. -->
            <option value="no" <?php selected($value, 'no'); ?>>
                <?php esc_html_e('No', 'Unisus'); ?>
            </option>
        </select>
        <?php
    }

}