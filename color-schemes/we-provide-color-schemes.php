<?php

/**
 * Add color schemes
 * @return Null   Returns null
 */
function we_provide_color_scheme() {
    //We/Provide color schemes
    wp_admin_css_color( 'We Provide dark', __( 'We Provide dark', 'We Provide' ),
        plugins_url( "css/dark.css", __FILE__ ),
        array( '#13233A', '#FF3F99','#FF884E', '#F7F8F8')
    );
//    wp_admin_css_color( 'We Provide light', __( 'We Provide light', 'We Provide' ),
//        plugins_url( "css/light.css", __FILE__ ),
//        array( '#989797', '#ffcc00', '#f7a600', '#d35401' )
//    );
}
add_action('admin_init', 'we_provide_color_scheme');

/**
 * Make We/Provide dark theme the default color on register
 * @param  Int      $user_id     The user id
 * @return Null                  Returns null
 */
function we_provide_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'We Provide dark'
    );
    wp_update_user( $args );
}
add_action('user_register', 'we_provide_default_admin_color');

?>
