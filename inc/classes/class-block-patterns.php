<?php
/**
 * enqueue Block Patterns 
 * @package Unisus
 */

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;


class Block_Patterns
{
    use singleton;
    public function __construct()
    {
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('init', [$this, 'register_block_patterns']);
        add_action('init', [$this, 'register_block_patterns_categories']);
    }

    public function register_block_patterns()
    {
        if (function_exists('register_block_pattern')) {
            register_block_pattern(
                'Unisus/cover',
                [
                    // Title of the block pattern 
                    'title' => __('Unisus Cover', 'Unisus'),

                    // Description of the block pattern
                    'description' => __('Unisus Cover Block with image and text', 'Unisus'),

                    // Category of this block pattern
                    'categories' => ['cover'],

                    // Raw html
                    'content' => '<!-- wp:cover {"url":"http://localhost:8080/Theme_1/wp-content/uploads/2024/03/yash-raut-z_zFPGX90mc-unsplash.jpg",
                                "id":119,"dimRatio":50,"layout":{"type":"constrained"}} -->
                                <div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-119" alt="" src="http://localhost:8080/Theme_1/wp-content/uploads/2024/03/yash-raut-z_zFPGX90mc-unsplash.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1} -->
                                <h1 class="wp-block-heading has-text-align-center">Jodhpur</h1>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}}},"textColor":"cyan-bluish-gray"} -->
                                <p class="has-text-align-center has-cyan-bluish-gray-color has-text-color has-link-color">Mehrangarh is a historic fort located in Jodhpur, Rajasthan, India. It stands on a hilltop, rising about 122 meters above the surrounding plains. The complex spans 1,200 acres</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:buttons {"align":"full","layout":{"type":"flex","justifyContent":"center"}} -->
                                <div class="wp-block-buttons alignfull"><!-- wp:button {"style":{"color":{"gradient":"linear-gradient(90deg,rgb(2,3,129) 0%,rgb(40,116,252) 97%)"},"border":{"radius":"100px"}},"className":"is-style-fill"} -->
                                <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-background wp-element-button" style="border-radius:100px;background:linear-gradient(90deg,rgb(2,3,129) 0%,rgb(40,116,252) 97%)">Blogs</a></div>
                                <!-- /wp:button --></div>
                                <!-- /wp:buttons --></div></div>
                                <!-- /wp:cover -->'
                ]
            );

        }
    }


    // Registering block pattern categories
    public function register_block_patterns_categories()
    {
        // Categories 
        $pattern_categories = [
            'cover' => __('Cover', 'Unisus'),
            'two-columns' => __('Two-columns', 'Unisus'),
        ];

        if (!empty($pattern_categories) && is_array($pattern_categories)) {
            foreach ($pattern_categories as $pattern_category => $pattern_category_label) {
                register_block_pattern_category(
                    $pattern_category,
                    ['label' => $pattern_category_label]
                );
            }
        }
    }

}