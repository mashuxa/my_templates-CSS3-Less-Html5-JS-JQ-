<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  TEMPLATE FOR INFOS PANEL
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
  <div class="panel panel-default">
   <div class="panel-heading">Posts Informations</div>
    <div class="panel-body">
  	 <ul>
	  <li>All posts publiched : <span id="nsw_total_posts"><?php echo $nsw_total_posts;?></span> Posts</li>
	  <li>All tags : <span id="nsw_total_tags"><?php echo $nsw_total_tag;?></span> items</li>
	 </ul>
    </div>
   </div>