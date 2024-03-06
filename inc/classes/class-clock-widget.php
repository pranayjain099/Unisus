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
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Clock', 'Unisus');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>">
                <?php _e('Title:', 'Unisus'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     * 
     * update function will update the value like if title is changed then this function will update it.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}