<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Tags Cleanup
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;


//if (isset($_GET['nsw_total_tag_old']))   { $nsw_total_tag_old = $_GET['nsw_total_tag_old']; } else { $nsw_total_tag_old == $nsw_total_tag; }    

$nsw_total_tag_old = isset($_GET['nsw_total_tag_old'])?$_GET['nsw_total_tag_old']:$nsw_total_tag;

$nsw_sql_gen_clean = $wpdb->prepare( " SELECT term_taxonomy_id,term_id FROM $wpdb->term_taxonomy WHERE taxonomy = %s LIMIT %d ", 'post_tag', $nsw_limit);

if ($nsw_total_tag >= 1) {

foreach( $wpdb->get_results($nsw_sql_gen_clean) as $key => $row)
          {
                        /************************************************************************/
                        $nsw_sql_gen_clean_etp1 = $wpdb->prepare( " DELETE FROM $wpdb->terms WHERE term_id = %d ", $row->term_id);
                        $nsw_result_clean_1 = $wpdb->query($nsw_sql_gen_clean_etp1);
                        $nsw_sql_gen_clean_etp2 = $wpdb->prepare( " DELETE FROM $wpdb->term_relationships WHERE term_taxonomy_id = %d ", $row->term_taxonomy_id);
                        $nsw_result_clean_2 = $wpdb->query($nsw_sql_gen_clean_etp2);
                        $nsw_sql_gen_clean_etp3 = $wpdb->prepare( " DELETE FROM $wpdb->term_taxonomy WHERE term_id = %d AND taxonomy = %s ", $row->term_id, 'post_tag');
                        $nsw_result_clean_3 = $wpdb->query($nsw_sql_gen_clean_etp3);
                        echo '<script>';
                        echo 'parent.document.getElementById("nsw-div-console").innerHTML += "';
                        echo '<p class=\"nsw_console_lgn_del\">> term ';
                        echo $row->term_id;
                        echo ' removed -term relationship removed -taxonomy removed </p>';
                        echo '";';
                        echo '</script>';
                        nsw_get_total_tags_console($nsw_total_tag);
                        nsw_get_msg_pourcent_tags_removed($nsw_total_posts,$nsw_total_tag,$nsw_total_tag_old);
                        /************************************************************************/
          } 
} else {

nsw_get_total_tags_console($nsw_total_tag);
nsw_get_msg_all_tags_removed();
nsw_get_msg_no_found_result();
nsw_get_console_scroll();
exit;
        }

nsw_get_console_scroll();
nsw_redirect_clean_tags($nsw_link,$nsw_limit,$nsw_total_tag_old);

?>