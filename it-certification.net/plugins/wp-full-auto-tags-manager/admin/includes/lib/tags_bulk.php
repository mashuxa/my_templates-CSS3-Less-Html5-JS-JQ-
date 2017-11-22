<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Tags Bulk
 * @since        2.1
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;

if ($nsw_total_posts >= $nsw_limit) {

nsw_get_total_tags_console($nsw_total_tag);
nsw_get_console_result_to($nsw_limit,$nsw_total_posts);

} else {

nsw_get_total_tags_console($nsw_total_tag);
nsw_get_console_result_to_result ($nsw_total_posts);

}

$nsw_sql_gen_tags = $wpdb->prepare(" SELECT ID, post_title FROM $wpdb->posts WHERE post_status = %s AND post_type = %s ORDER BY ID ASC LIMIT %d ", 'publish', 'post', $nsw_limit);
  	     	        	/************************************************************************/
  	     	        	$nsw_query_gen_tags = $wpdb->query($nsw_sql_gen_tags);
  	     	        	if ($nsw_total_posts >= $nsw_limit) {
                        foreach( $wpdb->get_results($nsw_sql_gen_tags) as $key => $row) {
                        $post_ID = $row->ID;
                        $post_title = $row->post_title;
                        $nsw_post_title = strtolower($post_title);
                        $posttags = get_the_tags($post_ID);
                        if ($posttags) 
                        {
                        foreach($posttags as $tag) 
                        {
                        //tags are available();
                        }
                        } 
                        else
                        {
                        $string = $nsw_post_title;
                        require ( dirname(__file__).'/cleanup_string.php' ); 
                        $keywords = explode( ' ', $string );   
                        $nsw_i = 0;
                        foreach ($keywords as $keyword){
                        if ((preg_match("/^[a-z0-9]/", $keyword) ) && (strlen($keyword) > 4)){
                        nsw_get_keyword_console ($keyword);
                        nsw_get_total_tags_console($nsw_total_tag);
                        $final_tags = ''.$keyword.'';
                        $nsw_i++;
                        if ($nsw_i == 7) break;
                        wp_set_post_tags($post_ID, $final_tags, true );	
                        }	
                        }
                        }
                        }
  	     	        	/************************************************************************/
nsw_get_console_scroll();
nsw_redirect_gen_tags($nsw_link,$nsw_limit);

} else { 

nsw_get_total_tags_final_console($nsw_total_tag);
nsw_get_console_scroll();

}
?>