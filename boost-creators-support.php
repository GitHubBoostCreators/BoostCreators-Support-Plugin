<?php
/*
Plugin Name: We/Provide care package
Plugin URI: http://www.weprovide.com/
Version: 1.0.4
Author: Tim Neutkens
Description: We/Provide standaard pakket
*/


/**
 * Add role on plugin activation
 */
function we_provide_add_roles_on_plugin_activation() {
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
	add_role( 'we_provide_user', __( 'We Provide User' ), $args );

	// Set We Provide dark theme for all users on activation
	$users = get_users();
	foreach ( $users as $user ) {
		$args = array(
			'ID'          => $user->ID,
			'admin_color' => 'We Provide dark'
		);
		wp_update_user( $args );
	}
}

register_activation_hook( __FILE__, 'we_provide_add_roles_on_plugin_activation' );


/**
 * Require all partitials
 */
require_once( 'color-schemes/we-provide-color-schemes.php' );
require_once( 'login/we-provide-login.php' );
require_once( 'dashboard/we-provide-dashboard.php' );
require_once( 'admin/we-provide-admin.php' );
require_once( 'security/we-provide-security.php' );
require_once( 'robots/we-provide-robots.php' );

