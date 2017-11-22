<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  TEMPLATE FOR CRON PANEL
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
  <div class="panel panel-default">
   <div class="panel-heading">Cron Job</div>
    <div class="panel-body">
    <p><div class="well well-sm">
       <div class="input-group">
       <span class="input-group-addon" id="basic-addon3"><div class="group-cron">Generate Tags : </div></span>
       <input type="text" class="form-control" value="<?php echo $nsw_url; echo $nsw_plugin_rep; ?>/cron/cron.php?action=gen_tags&key=<?php echo $nsw_md5key ?>"></div>
       </div>
    </p>
    <p><div class="well well-sm">
       <div class="input-group">
       <span class="input-group-addon" id="basic-addon3"><div class="group-cron">Clean Tags : </div></span>
       <input type="text" class="form-control" value="<?php echo $nsw_url; echo $nsw_plugin_rep; ?>/cron/cron.php?action=clean_tags&key=<?php echo $nsw_md5key; ?>"></div>
       </div>
       </p>
   </div>
  </div>