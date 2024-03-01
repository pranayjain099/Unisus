<?php

// Add all basic functionality of the theme 

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;

class UNISUS_THEME
{
    use singleton;

    protected function __construct()
    {
        // load classes
        Assets::getInstance();
        Menus::getInstance();
        Meta_Boxes::getInstance();
        Sidebars::getInstance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // actions and filters

        add_action('after_setup_theme', [$this, 'setup_theme']);

    }

    public function setup_theme()
    {
        // Adding site title dynamically
        add_theme_support('title-tag');

        //  Adding custom logo in admin custom sidebars.
        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true
        ]);

        // Adding custom background
        add_theme_support('custom-background', [
            'default-color' => 'fff',
            'default-image' => '',
            'default-repeat' => 'no-repeat',
        ]);

        // Adding post thumbnail 
        add_theme_support('post-thumbnails');

        // Selective refresh 
        add_theme_support('customize-selective-refresh-widgets');

        // Automatic feed link
        add_theme_support('automatic-feed-links');

        // HTML5 
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ]);

        add_theme_support('wp-block-styles');

        add_theme_support('align-wide');

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }

        // Register image sizes
        add_image_size('featured-thumbnail', 350, 233, true);


    }
}