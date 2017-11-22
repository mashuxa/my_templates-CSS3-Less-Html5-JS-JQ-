<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  TEMPLATE FOR OPTIONS
 * @since        2.1
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
  <div class="panel panel-default">
   <div class="panel-heading">Options</div>
    <div class="panel-body">

    <div class="container-fluid nsw_padding_b5">
    <h5 style="float: left;"><?php nsw_active_service_icon('post', $nsw_option_post_select_value);?> Create the tags automatically when publishing a post</h5> <?php nsw_active_service('post', $nsw_option_post_select_value, $nsw_link);  ?>
    </div>

    <div class="container-fluid nsw_padding_b5">
    <h5 style="float: left;"><?php nsw_active_service_icon('cron', $nsw_option_cron_select_value);?> Create automatically tags for untagged posts every hour with scheduler</h5> <?php nsw_active_service('cron', $nsw_option_cron_select_value, $nsw_link);  ?>
    </div>
<?php nsw_active_service_next_cron('cron', $nsw_option_cron_select_value);?>
   </div>
  </div>