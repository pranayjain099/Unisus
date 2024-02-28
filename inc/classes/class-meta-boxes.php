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
                $screen, // Post type
                'side',

            );
        }
    }

    public function custom_meta_box_html($post)
    {
        /**
         * Creating nonce for verification
         */

        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');

        // retrieving the value for the specified post id 
        $value = get_post_meta($post->ID, '_hide_page_title', true);


        ?>
        <!-- This is a label for the select box -->
        <label for="Unisus-field">
            <?php esc_html_e('Hide the page title', 'Unisus'); ?>
        </label>

        <select name="Unisus_hide_title_field" id="Unisus-field" class="postbox">
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

    public function save_post_meta_data($post_id)
    {
        /**
         * When the post is saved or updated we will verify the nonce 
         * check if the current user is authorized
         */

        //checking if the user can edit a post
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        /**
         * check if the nonce value we recieved is the same we created
         */

        if (!isset($_POST['hide_title_meta_box_nonce_name']) || !wp_verify_nonce(plugin_basename(__FILE__), $_POST['hide_title_meta_box_nonce_name'])) {
            return;
        }

        if (array_key_exists('Unisus_hide_title_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_hide_page_title', //key for the metabox
                $_POST['Unisus_hide_title_field'] //value for the metabox
            );
        }
    }

}