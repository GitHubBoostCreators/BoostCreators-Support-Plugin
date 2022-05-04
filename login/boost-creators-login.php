<?php

/**
 * Change login logo and styles
 * @return Null    Returns null
 */
function bc_login_styles() {

?>

<style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url(<?php echo plugins_url('images/site-login-logo.svg', __FILE__);?>);
    height: 65px;
    width: 320px;
    background-size: contain;
    background-repeat: no-repeat;
    padding-bottom: 30px;
}

body.login {
    background-image: url(<?php echo plugins_url('images/pattern.png', __FILE__);?>) !important;
    background-repeat: repeat;
}
</style>


<?php
  wp_enqueue_style( 'boost-creators-login', plugins_url( 'css/style.css', __FILE__ ) );
}

add_action( 'login_enqueue_scripts', 'bc_login_styles' );

/**
 * Change the logo url to boostcreators.nl
 * @return String   The url
 */
function bc_url() {
    return 'https://www.boostcreators.nl/';
}

add_filter( 'login_headerurl', 'bc_url' );


/**
 * Change the logo title to boostcreators.nl
 * @return String   The url
 */

function my_login_logo_url_title() {
  return 'Mogelijk gemaakt door Boostcreators';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );


?>
