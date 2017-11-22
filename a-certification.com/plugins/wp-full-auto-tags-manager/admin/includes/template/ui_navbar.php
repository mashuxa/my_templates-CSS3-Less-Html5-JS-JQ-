<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  TEMPLATE FOR NAVBAR
 * @since        2.0
 **/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo $nsw_author_url; ?>" target="_blank">
        <img alt="<?php echo $nsw_author; ?>" src="<?php echo $nsw_brand; ?>">
      </a>
      <a class="navbar-brand" href="<?php echo $nsw_author_url; ?>" target="_blank">
        <?php echo $nsw_author_no_url; ?>
      </a>
    </div>
    <div class="navbar-header navbar-right">
      <ul class="nav navbar-nav" id="ns_ui_navbar_link">
        <li><a href="#">Version <?php echo $nsw_plugin_version; ?></a></li>
                        <li><a href="<?php echo $donate_link; ?>" target="_blank">Donate to this plugin</a></li>
          <li class="dropdown" id="ns_ui_navbar_dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentation <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="nsw_dropdown_menu"><a href="<?php echo $nsw_plugin_url; ?>" target="_blank">Plugin Page</a></li>
              <li role="separator" class="divider nsw_menu_divider"></li>
              <li class="nsw_dropdown_menu"><a href="<?php echo $nsw_documentation_url; ?>" target="_blank">Website</a></li>
            </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>