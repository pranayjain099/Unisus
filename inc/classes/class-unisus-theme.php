<?php

// Add all basic functionality of the theme 

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;

class UNISUS_THEME
{
    use singleton;

    protected function __construct()
    {
        // load class
        Assets::getInstance();
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

    }
}