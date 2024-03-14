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
            /**
             * Cover Pattern
             */
            $cover_content = $this->get_pattern_content('template-parts/patterns/cover');


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
                    'content' => $cover_content,
                ]
            );

        }
    }

    public function get_pattern_content($template_path)
    {
        ob_start();

        get_template_part($template_path);

        $pattern_content = ob_get_contents();

        ob_end_clean();

        return $pattern_content;
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