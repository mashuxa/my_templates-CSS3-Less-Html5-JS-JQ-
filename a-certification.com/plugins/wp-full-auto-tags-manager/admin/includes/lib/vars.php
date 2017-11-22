<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Vars
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;



if (isset($_GET['nsw_i']))             { $nsw_i                  = $_GET['nsw_i'];             }
if (isset($_GET['nsw_action']))        { $nsw_action             = $_GET['nsw_action'];        }
if (isset($_GET['nsw_limit']))         { $nsw_limit              = $_GET['nsw_limit'];         }
if (isset($_GET['nsw_total_tag_old'])) { $nsw_total_tag_old      = $_GET['nsw_total_tag_old']; }

$nsw_plugin_rep         = "/wp-full-auto-tags-manager";
$nsw_plugin_id          = "wp-full-auto-tags-manager";
$nsw_url                = plugins_url();
$nsw_link               = "admin.php?page=wp-full-auto-tags-manager";
$nsw_brand              = $nsw_url."/wp-full-auto-tags-manager/assets/images/nsw_brand.png";
$nsw_author             = "Northswitch";
$nsw_author_url         = "http://core.northswitch.org";
$nsw_documentation_url  = "http://core.northswitch.org/plugins/wp-full-auto-tags-manager/";
$donate_link            = "https://www.payplug.com/p/KimH";
$nsw_plugin_url         = "https://wordpress.org/plugins/wp-full-auto-tags-manager/";
$nsw_author_no_url      = "core.northswitch.org";
$nsw_plugin_version     = nsw_readme_version($nsw_url,$nsw_plugin_rep);
$nsw_plugin_name        = "WP Full Auto Tags Manager";
?>