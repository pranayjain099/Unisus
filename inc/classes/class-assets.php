<?php
/**
 * Enqueue Theme Assets 
 * @package Unisus
 */

namespace UNISUS_THEME\Inc;

use UNISUS_THEME\Inc\Traits\singleton;


class Assets
{
    use singleton;
    public function __construct()
    {
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions

        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('enqueue_block_assets', [$this, 'enqueue_editor_assets']);

    }

    public function register_styles()
    {
        //Register styles

        wp_register_style('bootstrap-css', UNISUS_DIR_URI . '/assets/src/Library/css/bootstrap.min.css', [], false, 'all');

        wp_register_style('main-css', UNISUS_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime(UNISUS_BUILD_CSS_DIR_PATH . '/main.css'), 'all');


        // Enqueue styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('main-css');

    }

    public function register_scripts()
    {
        // Registering scripts 
        wp_register_script('main-js', UNISUS_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(UNISUS_BUILD_JS_DIR_PATH . '/main.js'), true);
        wp_register_script('bootstrap-js', UNISUS_DIR_URI . '/assets/src/Library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }

    public function enqueue_editor_assets()
    {
        $asset_config_file = sprintf('%s/assets.php', UNISUS_BUILD_PATH);

        if (!file_exists($asset_config_file)) {
            return;
        }

        $asset_config = require_once $asset_config_file;

        if (empty ($asset_config['js/editor.js'])) {
            return;
        }

        $editor_asset = $asset_config['js/editor.js'];
        $js_dependencies = (!empty ($editor_asset['dependencies'])) ? $editor_asset['dependencies'] : [];
        $version = (!empty ($editor_asset['version'])) ? $editor_asset['version'] : filemtime($asset_config_file);

        //Theme Gutenberg block JS ,include scripts only in the admin side.
        if (is_admin()) {
            wp_enqueue_script(
                'unisus-blocks-js',
                UNISUS_BUILD_JS_URI . '/blocks.js',
                $js_dependencies,
                $version,
                true
            );
        }

        //Theme gutenberg blocks css
        $css_dependencies = [
            'wp-block-library-theme',
            'wp-block-library',
        ];

        wp_enqueue_style(
            'unisus-blocks-css',
            UNISUS_BUILD_CSS_URI . '/blocks.css',
            $css_dependencies,
            filemtime(UNISUS_BUILD_CSS_DIR_PATH . '/blocks.css'),
            'all'
        );
    }
}