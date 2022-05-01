<?php
/**
 * Remove WordPress php/css editor.
 */
if(!defined('DISALLOW_FILE_EDIT')) {
  define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Change "Thanks for using WordPress" to We/Provide text
 * @return String   The string is displayed at the bottom of the WordPress backend
 */
function we_provide_admin_text() {
  if( current_user_can( 'edit_posts' ) ) {
    return 'Door <a href="https://www.weprovide.com/">We Provide</a>.<br />Voor vragen kunt u mailen naar <a href="mailto:info@weprovide.com">info@weprovide.com</a> of bellen naar +31 (0)88 6000 700';
  }
  else {
    return '';
  }
}

function we_provide_add_admin_text() {
    add_filter('admin_footer_text', 'we_provide_admin_text');
}

add_action('admin_init', 'we_provide_add_admin_text');


/**
 * Remove the version number from the footer
 * @return String   String that replaces the version number
 */
function we_provide_remove_footer_version() {
  return '';
}
add_filter( 'update_footer', 'we_provide_remove_footer_version', 9999);


/**
 * Remove the WordPress logo from the fixed menu bar
 * @return Null   Returns null
 */
function we_provide_remove_wp_admin_logo(){
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu' );
}

add_action( 'add_admin_bar_menus', 'we_provide_remove_wp_admin_logo');
