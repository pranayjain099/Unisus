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
        add_theme_support('title-tag');
    }
}