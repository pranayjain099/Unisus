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
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        // actions and filters
    }
}