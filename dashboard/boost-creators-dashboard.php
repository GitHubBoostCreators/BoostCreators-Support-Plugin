<?php

/**
 * Remove the welcome to WordPress panel
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/**
 * Remove the WordPress news panel
 * @return null   Returns null
 */
function bc_remove_widgets() {
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
}

add_action('wp_dashboard_setup', 'bc_remove_widgets');


// Register widget for search engine notice if the search engines are blocked.
/**
 * Text for the search engine notice box
 * @return Null   Returns null
 */
function bc_search_engine_notice_text() {
    echo 'U heeft zoekmachine indexering uit staan. Dit zorgt er voor dat uw site niet te vinden is in zoekmachines als Google.<br /><a href="options-reading.php">Klik hier</a> om deze instelling aan te passen.';
}

/**
 * Register dashboard search engine notice box
 * @return Null   Returns null
 */
function bc_search_engine_notice() {
  if( current_user_can( 'manage_options' ) ) {
    add_meta_box( 'my_dashboard_widget', 'LET OP!', 'bc_search_engine_notice_text', 'dashboard', 'side', 'high' );
  }
}

if( !get_option( 'blog_public' ) ) {
    add_action( 'wp_dashboard_setup', 'bc_search_engine_notice' );
}
?>
