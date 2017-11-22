<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  TEMPLATE FOR ACTION PANEL
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
  <div class="panel panel-default">
   <div class="panel-heading">Tags Actions</div>
    <div class="panel-body">
     <div class="tab-content">
      <a href="#" onclick="window.open('<?php echo $nsw_link; ?>&nsw_i=on&nsw_action=gen_tags&nsw_limit=25','nsw_i')" class="btn btn-default btn-lg nsw_btn_tag_left">Tag all posts</a>
      <a href="#" onclick="window.open('<?php echo $nsw_link; ?>&nsw_i=on&nsw_action=clean_tags&nsw_limit=25&','nsw_i')" class="btn btn-default btn-lg nsw_btn_tag_right">Delete all Tags</a>
    </div>
   </div>
  </div>