<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  PROGRESS BAR
 * @since        2.1
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="progress" id="nsw_progress" style="float:right; width:50%; display:none">
  <div class="progress-bar progress-bar-striped active" id="nsw_progress_bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    <span id="nsw_progress_txt" style="display:none">100% Complete</span>
  </div>
</div>