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

    public function get_menu_id($location)
    {
        // get all the locations
        $locations = get_nav_menu_locations();

        // get object id by location
        $menu_id = $locations[$location];

        // Return menu_id if not empty else don't return anything.
        return !empty($menu_id) ? $menu_id : '';


    }

    public function get_child_menu_items($menu_array, $parent_id)
    {
        // we will store all child menu in array first
        $child_menus = [];

        if (!empty($menu_array) && is_array($menu_array)) {

            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    // automatically pushes into array you are working with.
                    array_push($child_menus, $menu);
                }
            }
        }

        return $child_menus;
    }


}