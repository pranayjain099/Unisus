<?php
/**
 * Custom blocks 
 * @package UNISUS
 */

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;


class Blocks
{
    use singleton;
    protected function __construct()
    {
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */

        add_action('block_categories_all', [$this, 'add_block_categories']);
    }

    public function add_block_categories($categories)
    {
        $category_slugs = wp_list_pluck($categories, 'slug');

        // So to register it first we will check if the slug which we are making is already available in the core wordpress or not , if not then merge it with the existing wordpress category core array  if it does exits then return the $categories.

        $result = in_array('unisus', $category_slugs, true) ? $categories :
            array_merge(
                $categories,
                [
                    [
                        'slug' => 'Unisus',
                        'title' => __('Unisus Blocks', 'Unisus'),
                        'icon' => 'table-row-after'
                    ]
                ]
            );

        return $result;
    }
}