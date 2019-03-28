<?php
/*
Plugin Name: WP Lockdown
Plugin URI: https://extrawoo.com/
Description: Coming soon
Version: 0.0.2
Author: Extra Woo
Author URI: https://extrawoo.com
Text Domain: wp-lockdown
Domain Path: /languages
*/

// redirect the orginal author pages
function wp_lockdown_disable_author_page() {
    global $wp_query;

    // If an author page is requested, redirects to the home page
    if ( $wp_query->is_author ) {
        wp_safe_redirect( get_bloginfo( 'url' ), 301 );
        exit;
    }

}
add_action( 'wp', 'wp_lockdown_disable_author_page' );


// Replace the author link.
add_filter( 'author_link', 'wp_lockdown_new_author_link', 10, 1 );

function wp_lockdown_new_author_link( $link ) {         
    $link = home_url(); 

    return $link;               
}

// Disable XMLRPC
add_filter( 'xmlrpc_enabled', '__return_false' );
