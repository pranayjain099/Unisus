<?php
/**
 * Clock Widget - Custom Widget
 * 
 * @package UNISUS
 */

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;
use WP_Widget;

class Clock_Widget extends WP_Widget
{
    use singleton;
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'clock_widget', // Base ID
            'Clock', // Name
            ['description' => __('A clock Widget', 'Unisus')]// Args
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        // adding code for clock widget
        ?>
        <section class="card">
            <div class="clock card-body">
                <span id="time"></span>
                <span id="ampm"></span>
                <span id="time-emoji"></span>
            </div>
        </section>
        <?php
        echo $after_widget;
    }

}