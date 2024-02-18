<?php
/**
 * Register Menus
 * @package Unisus
 */

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;


class Menus
{
    use singleton;
    protected function __construct()
    {
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions.

        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus([
            'unisus-header-menu' => esc_html__('Header Menu', 'Uninus'),
            'unisus-footer-menu' => esc_html__('Footer Menu', 'Uninus'),
        ]);
    }


}