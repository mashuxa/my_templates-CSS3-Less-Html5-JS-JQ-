<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Actions and scheduler
 * @since        2.1
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;

/** 
 *@Description QUERY OPTIONS
 *@since 2.1
 **/

$nsw_init_value_option_post           =           "wp-full-auto-tags-manager_active_post";
$nsw_init_value_option_cron           =           "wp-full-auto-tags-manager_active_cron";

$nsw_init_option_post_select          =           $wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s AND option_value IS NOT NULL", $nsw_init_value_option_post);
$nsw_init_option_post_insert          =           $wpdb->prepare( " INSERT INTO $wpdb->options (option_id, option_name, option_value) VALUES (%d, %s, %d) ", '', $nsw_init_value_option_post, '1' );

$nsw_init_option_cron_select          =           $wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s AND option_value IS NOT NULL", $nsw_init_value_option_cron);
$nsw_init_option_cron_insert          =           $wpdb->prepare( " INSERT INTO $wpdb->options (option_id, option_name, option_value) VALUES (%d, %s, %d) ", '', $nsw_init_value_option_cron, '0' );

$nsw_init_option_post_select_result   =           $wpdb->query($nsw_init_option_post_select);
$nsw_init_option_cron_select_result   =           $wpdb->query($nsw_init_option_cron_select);


/** 
 *@Description CREATE OPTION IF DO NOT EXIST
 *@since 2.1
 **/
if ($nsw_init_option_post_select_result == '0') { $wpdb->query($nsw_init_option_post_insert); }
if ($nsw_init_option_cron_select_result == '0') { $wpdb->query($nsw_init_option_cron_insert); }


/** 
 *@Description CREATE TAG ON POST
 *@since 2.1
 **/
$wp_full_auto_tags_manager_active_post = $wpdb->get_var($wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s AND option_value IS NOT NULL", 'wp-full-auto-tags-manager_active_post'));
if ($wp_full_auto_tags_manager_active_post == '1') {
	add_action ( 'publish_post', 'wp_full_auto_tags_manager_post' );
}

function wp_full_auto_tags_manager_post($post_ID)  {
$nsw_post_title  = get_the_title( $post_ID );
$nsw_posttags    = get_the_tags( $post_ID );
if ($nsw_posttags) 
    { 

    }
else 
	{
  $string = $nsw_post_title;
  require ( dirname(__file__).'/cleanup_string.php' ); 
  require ( dirname(__file__).'/create_tags.php' ); 
	}
return $post_ID;
}


/** 
 *@Description CRON TAGS
 *@since 2.1
 **/
$wp_full_auto_tags_manager_active_cron = $wpdb->get_var($wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s AND option_value ", 'wp-full-auto-tags-manager_active_cron'));
if ($wp_full_auto_tags_manager_active_cron == '1') {
$nsw_cron_date = date('Y-m-d H:i:s');
$nsw_cron_date_plus = date( "Y-m-d H:i:s", strtotime( $nsw_cron_date." +1 hour" ) );
if ( $wpdb->query($wpdb->prepare( " SELECT option_value FROM $wpdb->options WHERE option_name = %s ", 'wp-full-auto-tags-manager_cron_time')) == '' ) {
$wpdb->query($wpdb->prepare( " INSERT INTO $wpdb->options (option_id, option_name, option_value) VALUES (%d, %s, %s) ", '', 'wp-full-auto-tags-manager_cron_time', $nsw_cron_date_plus ));
} else { 
$query_next_time = $wpdb->get_results($wpdb->prepare( " SELECT * FROM $wpdb->options WHERE option_name = %s ", 'wp-full-auto-tags-manager_cron_time'));
foreach ($query_next_time as $data) {
if ( strtotime($nsw_cron_date) > strtotime($data->option_value) ) { 
                        $nsw_sql_gen_tags = $wpdb->prepare(" SELECT ID, post_title FROM $wpdb->posts WHERE post_status = %s AND post_type = %s ORDER BY ID DESC LIMIT 500", 'publish', 'post');
                        foreach( $wpdb->get_results($nsw_sql_gen_tags) as $key => $row) {
                        $post_ID = $row->ID;
                        $nsw_post_title = $row->post_title;
                        $posttags = get_the_tags($post_ID);
                        if ($posttags) 
                        {
                        } 
                        else
                        {
                        $string = $nsw_post_title;
                        require ( dirname(__file__).'/cleanup_string.php' ); 
                        require ( dirname(__file__).'/create_tags.php' ); 
                        }	
                        }
                        $wpdb->query($wpdb->prepare(" UPDATE $wpdb->options SET option_value =%s WHERE option_name = %s ", $nsw_cron_date_plus, 'wp-full-auto-tags-manager_cron_time'));
}
}
}
}



?>