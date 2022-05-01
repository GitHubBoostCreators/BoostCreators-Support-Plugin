<?php

/**
 * Add color schemes
 * @return Null   Returns null
 */
function bc_color_scheme() {
    //Boost Creators color schemes
    wp_admin_css_color( 'Boost Creators dark', __( 'Boost Creators dark', 'mastertheme' ),
        plugins_url( "css/dark.css", __FILE__ ),
        array( '#13233A', '#FF3F99','#FF884E', '#F7F8F8')
    );
//    wp_admin_css_color( 'Boost Creators light', __( 'Boost Creators light', 'mastertheme' ),
//        plugins_url( "css/light.css", __FILE__ ),
//        array( '#989797', '#ffcc00', '#f7a600', '#d35401' )
//    );
}
add_action('admin_init', 'bc_color_scheme');

/**
 * MakeBoost Creators dark theme the default color on register
 * @param  Int      $user_id     The user id
 * @return Null                  Returns null
 */
function bc_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'Boost Creators dark'
    );
    wp_update_user( $args );
}
add_action('user_register', 'bc_default_admin_color');

?>
