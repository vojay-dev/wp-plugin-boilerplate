<?php

add_shortcode("my-plugin", "render");

function render() {
    // add your frontend code that renders your shortcode here
    ob_start();
    ?>
        <div class="wrap">
            <h2>Hello World!</h2>
        </div>
    <?php
    return ob_get_clean();
}
