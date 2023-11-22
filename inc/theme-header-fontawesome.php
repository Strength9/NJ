<?php

/**
 * Adds Font Awesome script to the header of the theme.
 *
 * @return void
 */

function warp_fontawesome() {
    $kitid = '7825d8b71b.js';
    echo '<script defer src="https://kit.fontawesome.com/'.$kitid.'" crossorigin="anonymous"></script>';
}

add_action('wp_head', 'warp_fontawesome', 1);

?>