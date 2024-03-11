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

// Defining constant for build directory
if (!defined('UNISUS_BUILD_URI')) {
    define('UNISUS_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/build');
}

// Defining constant for build JS directory
if (!defined('UNISUS_BUILD_JS_URI')) {
    define('UNISUS_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/build/js');
}

// Defining constantfor build  directory path 
if (!defined('UNISUS_BUILD_JS_DIR_PATH')) {
    define('UNISUS_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/build/js');
}

// Defining constant for build IMG directory
if (!defined('UNISUS_BUILD_IMG_URI')) {
    define('UNISUS_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . '/build/src/img');
}

// Defining constant for build CSS directory
if (!defined('UNISUS_BUILD_CSS_URI')) {
    define('UNISUS_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/build/css');
}

// Defining constantfor build  directory path 
if (!defined('UNISUS_BUILD_CSS_DIR_PATH')) {
    define('UNISUS_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/build/css');
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

