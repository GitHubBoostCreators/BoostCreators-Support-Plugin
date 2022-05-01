<?php
/**
 * Remove WordPress php/css editor.
 */
if(!defined('DISALLOW_FILE_EDIT')) {
  define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Change "Thanks for using WordPress" to Boost Creators text
 * @return String   The string is displayed at the bottom of the WordPress backend
 */
function bc_admin_text() {
  if( current_user_can( 'edit_posts' ) ) {
    return 'Door <a href="https://www.boostcreators.nl/">Boost Creators</a>.<br />Voor vragen kunt u mailen naar <a href="mailto:support@boostcreators.nl">support@boostcreators.nl</a> of bellen naar +31 (0)497 23 40 01';
  }
  else {
    return '';
  }
}

function bc_add_admin_text() {
    add_filter('admin_footer_text', 'bc_admin_text');
}

add_action('admin_init', 'bc_add_admin_text');


/**
 * Remove the version number from the footer
 * @return String   String that replaces the version number
 */
function bc_remove_footer_version() {
  return '';
}
add_filter( 'update_footer', 'bc_remove_footer_version', 9999);


/**
 * Remove the WordPress logo from the fixed menu bar
 * @return Null   Returns null
 */
function bc_remove_wp_admin_logo(){
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu' );
}

add_action( 'add_admin_bar_menus', 'bc_remove_wp_admin_logo');
