<?php

function add_new_donation_script(){
    wp_register_script('new_donation_script',
    get_stylesheet_directory_uri() . '/js/new-donation.js',
    array('jquery'),
    '1.0' );
    
    wp_enqueue_script('new_donation_script');
}

add_action('wp_enqueue_scripts', 'add_new_donation_script');

?>
