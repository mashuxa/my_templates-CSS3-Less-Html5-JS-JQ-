  <?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Create tags
 * @since        2.1
 **/
if ( ! defined( 'ABSPATH' ) ) exit;

  $keywords = explode( ' ', $string );      
  $nsw_i = 0;

                        foreach ($keywords as $keyword)
                        {

                        if ((preg_match("/^[a-z0-9]/", $keyword) ) && (strlen($keyword) > 4))
                           {
                           $final_tags = ''.$keyword.'';
                           wp_set_post_tags($post_ID, $final_tags, true );
                           $nsw_i++;
                           if ($nsw_i == 7) break;
                           }
	
                        }	

?>