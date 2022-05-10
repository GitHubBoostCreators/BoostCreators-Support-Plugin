<?php
/*
Plugin Name: Boost Creators Support
Plugin URI: https://www.boostcreators.nl/
Version: 1.0.3
Author: Boost Creators
Description: Boost Creators Support Plugin
*/


/**
 * Add role on plugin activation
 */
function bc_add_roles_on_plugin_activation() {
	$args = array(
		'activate_plugins'                          => false,
		'add_users'                                 => false,
		'create_roles'                              => false,
		'create_users'                              => false,
		'delete_others_pages'                       => true,
		'delete_others_posts'                       => true,
		'delete_pages'                              => true,
		'delete_plugins'                            => false,
		'delete_posts'                              => true,
		'delete_private_pages'                      => true,
		'delete_private_posts'                      => true,
		'delete_published_pages'                    => true,
		'delete_published_posts'                    => true,
		'delete_roles'                              => false,
		'delete_themes'                             => false,
		'delete_users'                              => false,
		'edit_dashboard'                            => false,
		'edit_others_pages'                         => true,
		'edit_others_posts'                         => true,
		'edit_pages'                                => true,
		'edit_posts'                                => true,
		'edit_private_pages'                        => true,
		'edit_private_posts'                        => true,
		'edit_published_pages'                      => true,
		'edit_published_posts'                      => true,
		'edit_roles'                                => false,
		'edit_theme_options'                        => false,
		'edit_users'                                => false,
		'export'                                    => false,
		'import'                                    => false,
		'install_plugins'                           => false,
		'install_themes'                            => false,
		'list_roles'                                => false,
		'list_users'                                => false,
		'manage_categories'                         => true,
		'manage_links'                              => false,
		'manage_options'                            => false,
		'moderate_comments'                         => false,
		'promote_users'                             => false,
		'publish_pages'                             => true,
		'publish_posts'                             => true,
		'read'                                      => true,
		'read_private_pages'                        => true,
		'read_private_posts'                        => true,
		'remove_users'                              => false,
		'restrict_content'                          => false,
		'switch_themes'                             => false,
		'unfiltered_html'                           => false,
		'update_core'                               => false,
		'update_plugins'                            => false,
		'update_themes'                             => false,
		'upload_files'                              => true,
		'wpml_manage_languages'                     => false,
		'wpml_manage_media_translation'             => false,
		'wpml_manage_navigation'                    => false,
		'wpml_manage_sticky_links'                  => false,
		'wpml_manage_string_translation'            => false,
		'wpml_manage_support'                       => false,
		'wpml_manage_taxonomy_translation'          => false,
		'wpml_manage_theme_and_plugin_localization' => false,
		'wpml_manage_translation_analytics'         => false,
		'wpml_manage_translation_management'        => false,
		'wpml_manage_translation_options'           => false,
		'wpml_manage_troubleshooting'               => false,
		'wpml_manage_woocommerce_multilingual'      => false,
		'wpml_manage_wp_menus_sync'                 => false,
		'wpml_operate_woocommerce_multilingual'     => false,
		'wpseo_bulk_edit'                           => false,
	);
	add_role( 'bc_user', __( 'Boost Creators User' ), $args );

	// Set Boost Creators dark theme for all users on activation
	$users = get_users();
	foreach ( $users as $user ) {
		$args = array(
			'ID'          => $user->ID,
			'admin_color' => 'Boost Creators dark'
		);
		wp_update_user( $args );
	}
}

register_activation_hook( __FILE__, 'bc_add_roles_on_plugin_activation' );


/**
 * Require all partitials
 */
require_once( 'color-schemes/boost-creators-color-schemes.php' );
require_once( 'login/boost-creators-login.php' );
require_once( 'dashboard/boost-creators-dashboard.php' );
require_once( 'admin/boost-creators-admin.php' );
require_once( 'security/boost-creators-security.php' );
require_once( 'robots/boost-creators-robots.php' );


if( ! class_exists( 'BC_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}

// Explain updater https://www.smashingmagazine.com/2015/08/deploy-wordpress-plugins-with-github-using-transients/
$updater = new BC_Updater( __FILE__ );
$updater->set_username( 'GitHubBoostCreators' );
$updater->set_repository( 'BoostCreators-Support-Plugin' );
/*
	$updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos
*/
$updater->initialize();