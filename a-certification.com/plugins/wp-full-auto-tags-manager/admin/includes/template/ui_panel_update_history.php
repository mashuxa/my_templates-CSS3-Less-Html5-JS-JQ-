<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  TEMPLATE FOR UPDATE HISTORY
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
$readme = file_get_contents($nsw_url.''.$nsw_plugin_rep.'/readme.txt');
$readme = nsw_readme_parser($readme,$nsw_plugin_name);
?>
  <div class="panel panel-default">
   <div class="panel-heading">Update History</div>
    <div class="panel-body nsw_update_panel">

<?php echo $readme; ?>

   </div>
  </div>