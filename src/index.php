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
    $src = plugin_dir_url(__FILE__) . "style.css";
    wp_enqueue_style("my-style", $src, array());
}

function enqueue_my_scripts() {
    $src = plugin_dir_url(__FILE__) . "script.js";
    wp_enqueue_script("my-script", $src, array("jquery"));
}

function enqueue_my_block() {
    $src = plugin_dir_url(__FILE__) . "block.js";
    wp_enqueue_script("my-block", $src, array("wp-blocks", "wp-element", "wp-editor"));
}

add_action("wp_enqueue_scripts", "enqueue_my_styles");
add_action("wp_enqueue_scripts", "enqueue_my_scripts");

add_action("enqueue_block_editor_assets", "enqueue_my_block");
