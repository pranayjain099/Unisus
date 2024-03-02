<?php
/**
 * Class for registering sidebars
 * 
 * @package Unisus
 */

namespace Unisus_THEME\Inc;

use Unisus_THEME\Inc\Traits\singleton;


class Sidebars
{
    use singleton;
    public function __construct()
    {
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */
        add_action('widgets_init', [$this, 'register_sidebars']);

    }

    public function register_sidebars()
    {
        //registering two sidebars
        register_sidebar([
            'name' => __('Sidebar', 'Unisus'),
            'id' => "sidebar-1",
            'description' => __('Main Sidebar', 'Unisus'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);

        register_sidebar([
            'name' => __('Footer', 'Unisus'),
            'id' => "sidebar-2",
            'description' => __('Footer Sidebar', 'Unisus'),
            'before_widget' => '<div id="%1$s" class="widget widget-footer cell colum %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
    }


}