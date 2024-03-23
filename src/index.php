<?php
/**
* Plugin Name: My Plugin
* Plugin URI: https://vojay.de/
* Description: Boilerplate to develop your own WordPress plugin
* Version: 0.1
* Author: Volker Janz
* Author URI: https://vojay.de/
**/

// global variables for your plugin
define("MY_PLUGIN_PATH", plugin_dir_path(__FILE__));
define("MY_PLUGIN_SLUG", "my-plugin");

require_once MY_PLUGIN_PATH . "admin.php";
require_once MY_PLUGIN_PATH . "frontend.php";

register_activation_hook(__FILE__, "setup_db");

function setup_db() {
    // database setup code
}

function enqueue_my_styles() {
    wp_enqueue_style("my-style", plugin_dir_url(__FILE__) . "style.css");
}

function enqueue_my_scripts() {
    wp_enqueue_script("my-script", plugin_dir_url(__FILE__) . "script.js", array("jquery"), "1.0", true);
}

add_action("wp_enqueue_scripts", "enqueue_my_styles");
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');
