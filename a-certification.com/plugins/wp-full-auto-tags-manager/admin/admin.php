<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Functions
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
$nsw_dir = plugin_dir_path( __FILE__ );
require $nsw_dir.'/includes/lib/functions.php';
require $nsw_dir.'/includes/lib/vars.php';
require $nsw_dir.'/includes/lib/queries.php';

if (isset($_GET['nsw_i'])) { $nsw_i = $_GET['nsw_i']; } else { $nsw_i = '';}
if ($nsw_i == '') {
nsw_e($nsw_plugin_id,$nsw_plugin_version);
echo "<div class=\"container\">";
require $nsw_dir.'/includes/template/ui_navbar.php';
require $nsw_dir.'/includes/template/ui_page_header.php';
echo "<div id=\"nsw-ui-header\"></div>";
echo "<div class=\"row\">";
echo "<div class=\"col-md-6\">";
require $nsw_dir.'/includes/template/ui_panel_infos.php';
require $nsw_dir.'/includes/template/ui_panel_actions.php';
require $nsw_dir.'/includes/template/ui_panel_options.php';
require $nsw_dir.'/includes/template/ui_panel_update_history.php';
echo "</div>";
echo "<div class=\"col-md-6\">
      <div class=\"panel panel-default\">
      <div class=\"panel-heading\">Console ";
require $nsw_dir.'/includes/template/ui_progress.php';
echo "</div>
      <div class=\"panel-body console\" id=\"nsw-console\">";
nsw_ui_console();
echo "</div></div>";
//DEL
echo"</div>
      </div>";
echo "</div>";
echo "<div id=\"nsw-ui-footer\"></div>";
} 
else {
if ($nsw_action == "gen_tags") { require $nsw_dir.'/includes/lib/tags_bulk.php'; } 
if ($nsw_action == "clean_tags") { require $nsw_dir.'/includes/lib/tags_cleanup.php'; } 
}
?>