<?php

namespace Unisus_Theme\Inc\Traits;

trait singleton
{
    public function __construct()
    {

    }

    public function __clone()
    {

    }

    // This function will return the single instance of the class.
    final public static function getInstance()
    {
        static $instance = [];
        $class_Name = get_called_class();

        if (!isset($instance[$class_Name])) {
            $instance[$class_Name] = new $class_Name();

            // if any plugin want to hook at this point 

            do_action(sprintf('unisus_theme_singleton_init%s'), $class_Name);
        }

        return $instance[$class_Name];
    }
}