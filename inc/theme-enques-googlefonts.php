<?php

function warp_google_fonts() {

    $googleurl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Syne:wght@600&display=swap';

    echo '<link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="'.$googleurl.'" rel="stylesheet">';
 
 }
 
 add_action('wp_head', 'warp_google_fonts', 2);
 
?>