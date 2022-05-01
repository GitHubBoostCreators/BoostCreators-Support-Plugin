<?php

/**
 * Change login logo and styles
 * @return Null    Returns null
 */
function we_provide_login_styles() {

?>

  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?php echo plugins_url( 'images/logo.png', __FILE__ ); ?>);
    }
    .forgetmenot {
      float:none !important;
    }
  </style>

<?php
  wp_enqueue_style( 'we-provide-login', plugins_url( 'css/we-provide-login.css', __FILE__ ) );
}

add_action( 'login_enqueue_scripts', 'we_provide_login_styles' );

/**
 * Change the logo url to weprovide.nl
 * @return String   The url
 */
function we_provide_url() {
    return 'https://www.weprovide.com/';
}

add_filter( 'login_headerurl', 'we_provide_url' );

?>
