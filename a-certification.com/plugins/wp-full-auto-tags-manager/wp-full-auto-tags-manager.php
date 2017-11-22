<?php
/*
Plugin Name: WP Full Auto Tags Manager
Plugin URI: https://wordpress.org/plugins/wp-full-auto-tags-manager/
Description: WP Full Auto Tags Manager automatically create tags for all your blog posts.
Version: 2.2
Author: Guillemant David
Contributors: Northswitch
Author URI: http://core.northswitch.org/
Licence: GPLv2
*/
//DEL

if ( ! defined( 'ABSPATH' ) ) exit;

require_once ( dirname(__file__).'/admin/includes/lib/actions.php' ); 

if ( is_admin() ) {

//DEL 
add_action( 'admin_enqueue_scripts', 'nsw_wp_full_auto_tags_manager_enqueue_scripts' );
function nsw_wp_full_auto_tags_manager_enqueue_scripts() {
	if (isset($_GET['page'])) { $nsw_page = $_GET['page']; } else { $nsw_page = ''; }
	if ('wp-full-auto-tags-manager' == $nsw_page) { 
    wp_enqueue_style( 'wp-full-auto-tags-manager-bootstrap', plugins_url('/assets/vendor/bootstrap-3.3.6-dist/css/bootstrap.css', __FILE__) );
    wp_enqueue_style( 'wp-full-auto-tags-manager-bootstrap-theme', plugins_url('/assets/vendor/bootstrap-3.3.6-dist/css/bootstrap-theme.css', __FILE__) );
    wp_enqueue_style( 'wp-full-auto-tags-manager-style', plugins_url('/assets/css/styles.css', __FILE__) );
    wp_enqueue_script( 'wp-full-auto-tags-manager-bootstrap-js', plugins_url('/assets/vendor/bootstrap-3.3.6-dist/js/bootstrap.min.js', __FILE__) );
	}
}

add_action('admin_menu', 'nsw_wp_full_auto_tags_manager');
function nsw_wp_full_auto_tags_manager() { add_menu_page( 'WP Full Auto Tags Manager', 'Tags Manager', 'manage_options', 'wp-full-auto-tags-manager', 'init_nsw_ui_wp_full_auto_tags_manager' ); }
function init_nsw_ui_wp_full_auto_tags_manager(){ 
	require_once ( dirname(__file__).'/admin/admin.php' ); 
   }
} 
?>