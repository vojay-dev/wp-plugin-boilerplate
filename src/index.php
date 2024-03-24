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
define("MY_PLUGIN_URL", plugin_dir_url(__FILE__));
define("MY_PLUGIN_SLUG", "my-plugin");

require_once MY_PLUGIN_PATH . "admin.php";
require_once MY_PLUGIN_PATH . "frontend.php";

register_activation_hook(__FILE__, "setup_db");

function setup_db() {
    // database setup code
}

function get_url($file) {
    return MY_PLUGIN_URL . $file;
}

function get_path($file) {
    return MY_PLUGIN_PATH . $file;
}

function enqueue_my_styles() {
    wp_enqueue_style("my-style", get_url("style.css"), array(), filemtime(get_path("style.css")));
}

function enqueue_my_scripts() {
    wp_enqueue_script("my-script", get_url("script.js"), array("jquery"), filemtime(get_path("script.js")));
}

function enqueue_my_blocks() {
    wp_enqueue_script(
        "my-block",
        get_url("block.js"),
        array("wp-blocks", "wp-element", "wp-editor"),
        filemtime(get_path("block.js"))
    );
}

add_action("wp_enqueue_scripts", "enqueue_my_styles");
add_action("wp_enqueue_scripts", "enqueue_my_scripts");

add_action("enqueue_block_editor_assets", "enqueue_my_blocks");
