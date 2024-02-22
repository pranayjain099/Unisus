<?php

// @package Unisus

// Defining constant directory path 
if (!defined('UNISUS_DIR_PATH')) {
    define('UNISUS_DIR_PATH', untrailingslashit(get_template_directory()));
}


// Defining constant directory uri
if (!defined('UNISUS_DIR_URI')) {
    define('UNISUS_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once UNISUS_DIR_PATH . '/inc/helpers/autoloader.php';
require_once UNISUS_DIR_PATH . '/inc/helpers/template-tags.php';

// Autoloaders will automatically load the class when the class is instanceated or when the obj of that class is created
function unisus_get_theme_instance()
{
    // creating object of the class UNISUS_THEME , we created object here so that we can add functionality
    \UNISUS_THEME\Inc\UNISUS_THEME::getInstance();
}

unisus_get_theme_instance();

