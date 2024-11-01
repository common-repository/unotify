<?php
/*
Plugin Name: Unotify
Description: Just one click and Unotify will be ready in your website
Author: Unotify
Version: 1.0.1
Author URI: https://unotify.net
License: GPLv2
Plugin URI: https://unotify.net/
*/

defined('ABSPATH') or die('Restricted access!');

define('UNOTIFY_PLUGIN_SLUG', 'unotify');
define('UNOTIFY_PLUGIN_URL', plugin_dir_url(__FILE__));
define('UNOTIFY_PLUGIN_DIR', str_replace('\\', '/', dirname(__FILE__)));
define('UNOTIFY_BASE_URL', 'https://app.unotify.net');

if (!class_exists('UNotify')) {
    

    class UNotify
    {
        public function __construct()
        {
            add_action('admin_init', [$this, 'init_settings']);
            add_action('admin_menu', [$this, 'init_menu']);
            add_action('wp_head', [$this, 'unotify_pixel']);
        }

        public function init_settings()
        {
            register_setting('unotify-site-key', 'unotify-site-key');
        }

        public function init_menu()
        {
            add_menu_page(
                'UNotify',
                'Unotify',
                'manage_options',
                UNOTIFY_PLUGIN_SLUG,
                [$this, 'unotify_options'],
                UNOTIFY_PLUGIN_URL . 'unotify_icon.png'
            );
        }

        public function unotify_pixel()
        {
            $key = get_option('unotify-site-key', '');
            $url = UNOTIFY_BASE_URL . "/pixel/";

            echo implode("\n", array(
                '<!-- Unotify Code for https://app.unotify.net/ -->',
                '<script async src="'.$url.$key.'"></script>',
                '<!-- END Unotify Code -->',
            ));
        }

        

        public function unotify_options()
        {
            require_once(UNOTIFY_PLUGIN_DIR . '/settings/options.php');
        }


    }

    $unotify = new UNotify();
}
