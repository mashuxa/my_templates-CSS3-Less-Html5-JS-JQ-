<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Query
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;

/** 
 *@Description QUERY POSTS AND TAGS
 *@since 2.0
 **/
$nsw_total_posts_query           =           $wpdb->prepare( " SELECT ID FROM $wpdb->posts WHERE post_status = %s AND post_type = %s ", 'publish', 'post');
$nsw_total_tag_query             =           $wpdb->prepare( " SELECT term_ID FROM $wpdb->term_taxonomy WHERE taxonomy = %s ", 'post_tag');

$nsw_total_posts                 =           $wpdb->query($nsw_total_posts_query);
$nsw_total_tag                   =           $wpdb->query($nsw_total_tag_query);

/** 
 *@Description QUERY OPTIONS
 *@since 2.1
 **/
if (isset($_GET['nsw_active_option']))                   { $nsw_active_option               =           $_GET['nsw_active_option']; }
if (isset($_GET['nsw_active_option_value']))             { $nsw_active_option_value         =           $_GET['nsw_active_option_value']; }

$nsw_value_option_post           =           $nsw_plugin_id."_active_post";
$nsw_value_option_cron           =           $nsw_plugin_id."_active_cron";

$nsw_option_post_select          =           $wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s AND option_value IS NOT NULL", $nsw_value_option_post);
$nsw_option_post_insert          =           $wpdb->prepare( " INSERT INTO $wpdb->options (option_id, option_name, option_value) VALUES (%d, %s, %d) ", '', $nsw_value_option_post, '0' );

$nsw_option_cron_select          =           $wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s AND option_value IS NOT NULL", $nsw_value_option_cron);
$nsw_option_cron_insert          =           $wpdb->prepare( " INSERT INTO $wpdb->options (option_id, option_name, option_value) VALUES (%d, %s, %d) ", '', $nsw_value_option_cron, '0' );

$nsw_option_post_select_result   =           $wpdb->query($nsw_option_post_select);
$nsw_option_cron_select_result   =           $wpdb->query($nsw_option_cron_select);

$nsw_option_post_select_value    =           $wpdb->get_var($nsw_option_post_select);
$nsw_option_cron_select_value    =           $wpdb->get_var($nsw_option_cron_select);

/** 
 *@Description CREATE OPTION IF DO NOT EXIST
 *@since 2.1
 **/
if ($nsw_option_post_select_result == '0') { $wpdb->query($nsw_option_post_insert); }

if ($nsw_option_cron_select_result == '0') { $wpdb->query($nsw_option_cron_insert); }

/** 
 *@Description GET RESULT OPTIONS
 *@since 2.1
 **/

if (isset($_GET['nsw_active_option']) && isset($_GET['nsw_active_option_value'])) {

if ($nsw_active_option == 'post' && $nsw_active_option_value == '1') {
$wpdb->query($wpdb->prepare(" UPDATE $wpdb->options SET option_value =%d WHERE option_name = %s ", 1, $nsw_value_option_post));
echo '<script> window.parent.location.reload(); </script>';
}

if ($nsw_active_option == 'post' && $nsw_active_option_value == '0') {
$wpdb->query($wpdb->prepare(" UPDATE $wpdb->options SET option_value =%d WHERE option_name = %s ", 0, $nsw_value_option_post));
echo '<script> window.parent.location.reload(); </script>';
}

if ($nsw_active_option == 'cron' && $nsw_active_option_value == '1') {
$wpdb->query($wpdb->prepare(" UPDATE $wpdb->options SET option_value =%d WHERE option_name = %s ", 1, $nsw_value_option_cron));
echo '<script> window.parent.location.reload(); </script>';
}

if ($nsw_active_option == 'cron' && $nsw_active_option_value == '0') {
$wpdb->query($wpdb->prepare(" UPDATE $wpdb->options SET option_value =%d WHERE option_name = %s ", 0, $nsw_value_option_cron));
echo '<script> window.parent.location.reload(); </script>';
}

}

?>