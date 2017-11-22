<?php
/**
 * @package      Wp Full Auto Tags Manager
 * @author       Guillemant David
 * @url          http://core.northswitch.org/plugins/wp-full-auto-tags-manager/
 * @Description  Functions
 * @since        2.1
 **/
if ( ! defined( 'ABSPATH' ) ) exit;

/** 
 * GET TAGS TO CONSOLE
 * @since 2.0
 **/
function nsw_get_keyword_console ($keyword) {
	   echo '<script>parent.document.getElementById("nsw-div-console").innerHTML += "<p>> '.$keyword.'</p>";</script>';
}

/**
 * GET TOTAL TAGS TO CONSOLE
 * @since 2.0
 **/
function nsw_get_total_tags_console ($nsw_total_tag) {
	   echo '<script>parent.document.getElementById("nsw_total_tags").innerHTML = "'.$nsw_total_tag.'";</script>';
}

/**
 * GET FINAL TOTAL TAGS TO CONSOLE
 * @since 2.0
 **/
function nsw_get_total_tags_final_console ($nsw_total_tag) {
       echo '<script>parent.document.getElementById("nsw_progress_bar").style.width = "100%";</script>';
       echo '<script>';
       echo 'parent.document.getElementById("nsw-div-console").innerHTML += "<p class=\"nsw_console_lgn_1\">> '.$nsw_total_tag.' tags created</p>";';
       echo 'parent.document.getElementById("nsw_total_tags").innerHTML = "'.$nsw_total_tag.'";';
       echo '</script>';
}

/**
 * GET MSG ALL TAGS REMOVED
 * @since 2.0
 **/
function nsw_get_msg_all_tags_removed () {
	 echo '<script>parent.document.getElementById("nsw-div-console").innerHTML += "<p class=\"nsw_console_lgn_1\">> all tags removed</p>";</script>';
	 echo '<script>parent.document.getElementById("nsw_progress_txt").style.display = "none";</script>';
     echo '<script>parent.document.getElementById("nsw_progress_bar").style.width = "0%";</script>';
     echo '<script>setTimeout(function(){ parent.document.getElementById("nsw_progress").style.display = "none" ; }, 2000);</script>';
}

/**
 * GET MSG POURCENT TAGS REMOVED
 * @since 2.0
 **/
function nsw_get_msg_pourcent_tags_removed ($nsw_total_posts,$nsw_total_tag,$nsw_total_tag_old) {
     $pourcent = ($nsw_total_tag*100)/$nsw_total_tag_old;
     echo '<script>parent.document.getElementById("nsw_progress_txt").style.display = "none";</script>';
     echo '<script>parent.document.getElementById("nsw_progress").style.display = "block";</script>';
     echo '<script>parent.document.getElementById("nsw_progress_bar").style.width = "'.$pourcent.'%";</script>';
}

/**
 * GET MSG NO RESULT FOUND
 * @since 2.0
 **/
function nsw_get_msg_no_found_result () {
	   echo '<script>parent.document.getElementById("nsw-div-console").innerHTML += "<p class=\"nsw_console_lgn_1\">> no result found</p>";</script>';
}

/**
 * GET SCROLLTOP
 * @since 2.0
 **/
function nsw_get_console_scroll () {
	   echo '<script>var objDiv = parent.document.getElementById("nsw-div-console"); objDiv.scrollTop = objDiv.scrollHeight;</script>';
}

/**
 * GET PROCESS PAGE
 * @since 2.0
 **/
function nsw_get_console_result_to ($nsw_limit,$totalResult) {
     $pourcent = ($nsw_limit*100)/$totalResult;
	   echo '<script>parent.document.getElementById("nsw-div-console").innerHTML += "<p class=\"nsw_console_lgn_1\">> number of processed page '.$nsw_limit.' to '.$totalResult.'</p>";</script>';
     echo '<script>parent.document.getElementById("nsw_progress").style.display = "block";</script>';
     echo '<script>parent.document.getElementById("nsw_progress_bar").style.width = "'.$pourcent.'%";</script>';
     echo '<script>parent.document.getElementById("nsw_progress_txt").style.display = "none";</script>';
}

/**
 *  GET FINAL PROCESS PAGE
 * @since 2.0
 **/
function nsw_get_console_result_to_result ($totalResult) {
     echo '<script>parent.document.getElementById("nsw-div-console").innerHTML += "<p class=\"nsw_console_lgn_1\">> number of processed page '.$totalResult.' to '.$totalResult.'</p>";</script>';
     echo '<script>parent.document.getElementById("nsw_progress_txt").style.display = "none";</script>';
     echo '<script>parent.document.getElementById("nsw_progress_bar").className  = "progress-bar progress-bar-striped";</script>';
     echo '<script>setTimeout(function(){ parent.document.getElementById("nsw_progress").style.display = "none" ; }, 3000);</script>';
}

/**
 * PAGE REDIRECT GEN
 * @since 2.0
 **/
function nsw_redirect_gen_tags ($nsw_link,$nsw_limit) {
	   echo '<script>location.href="'.$nsw_link.'&nsw_i=on&nsw_action=gen_tags&nsw_limit='.($nsw_limit+(25)).'";</script>';
}

/**
 * PAGE REDIRECT CLEAN
 * @since 2.0
 **/
function nsw_redirect_clean_tags ($nsw_link,$nsw_limit,$nsw_total_tag_old) {
       echo '<script>location.href="'.$nsw_link.'&nsw_i=on&nsw_action=clean_tags&nsw_limit='.($nsw_limit+(25)).'&nsw_total_tag_old='.$nsw_total_tag_old.'";</script>';
}

/** 
 * GET TAGS ARE AVAILABLE TO CONSOLE
 * @since 2.0
 **/
function nsw_tags_are_available () {
       echo '<script>parent.document.getElementById("nsw-div-console").innerHTML += "<p class=\"nsw_console_lgn_1\">> no result found</p>";</script>';
}

/**
 * CONSOLE
 * @since 2.0
 **/
function nsw_ui_console () {
       echo '<script>document.getElementById("nsw-console").innerHTML = "';
       echo '<div id=\"nsw-div-console\" class=\"nsw_console_container\"><p class=\"row\">> console</p></div><iframe id=\"nsw_i\" name=\"nsw_i\" class=\"hidden\" width=\"0px\" height=\"0px\" frameborder=\"0\" scrolling=\"no\">';
       echo '";</script>';
}

/**
 * PLUGIN NOTIFICATION
 * @since 2.0
 **/
function nsw_e ($nsw_plugin_id,$nsw_plugin_version) {
	   echo '<script type="text/javascript" src="http://core.northswitch.org/core-api/wp-notification.php?plugin='.$nsw_plugin_id.'&version='.$nsw_plugin_version.'"></script>';
	   echo '<script type="text/javascript">setTimeout(function(){ nsw_external_info(); }, 3000);</script>';
}

/**
 * README PARSER CHANGELOG
 * @since 2.0
 **/
function nsw_readme_parser ($readme,$nsw_plugin_name) {
$readme = preg_replace("/(\n\r|\r\n|\r|\n)/", "\n", $readme);

  $s = array('===','==','=' );
  $r = array('h2' ,'h3','h4');
  for ( $x = 0; $x < sizeof($s); $x++ )
  $readme = preg_replace('/(.*?)'.$s[$x].'(?!\")(.*?)'.$s[$x].'(.*?)/', '$1<'.$r[$x].'>$2</'.$r[$x].'>$3', $readme);

  $s = array('\*\*','\''  );
  $r = array('b'   ,'code');
  for ( $x = 0; $x < sizeof($s); $x++ )
  $readme = preg_replace('/(.*?)'.$s[$x].'(?!\s)(.*?)(?!\s)'.$s[$x].'(.*?)/', '$1<'.$r[$x].'>$2</'.$r[$x].'>$3', $readme);
  
  // ' _italic_ '
  $readme = preg_replace('/(\s)_(\S.*?\S)_(\s|$)/', ' <em>$2</em> ', $readme);
  
  // ul lists 
  $s = array('\*','\+','\-');
  for ( $x = 0; $x < sizeof($s); $x++ )
  $readme = preg_replace('/^['.$s[$x].'](\s)(.*?)(\n|$)/m', '<li>$2</li>', $readme);
  $readme = preg_replace('/\n<li>(.*?)/', '<ul><li>$1', $readme);
  $readme = preg_replace('/(<\/li>)(?!<li>)/', '$1</ul>', $readme);
  
  // ol lists
  $readme = preg_replace('/(\d{1,2}\.)\s(.*?)(\n|$)/', '<li>$2</li>', $readme);
  $readme = preg_replace('/\n<li>(.*?)/', '<ol><li>$1', $readme);
  $readme = preg_replace('/(<\/li>)(?!(\<li\>|\<\/ul\>))/', '$1</ol>', $readme);
  
  // line breaks
  $readme = preg_replace('/(.*?)(\n)/', "$1<br/>\n", $readme);
  $readme = preg_replace('/(1|2|3|4)(><br\/>)/', '$1>', $readme);
  $readme = str_replace('</ul><br/>', '</ul>', $readme);
  $readme = str_replace('<br/><br/>', '<br/>', $readme);
  
  // Div
  $readme = preg_replace('/(<h2> '.$nsw_plugin_name.' <\/h2>)/', "<div id=\"readme-description\" class=\"nsw-hidden\">\n$1\n", $readme);
  $readme = preg_replace('/(<h3> Changelog <\/h3>)/', "</div><div id=\"readme-changelog\">\n$1\n", $readme);
  $readme = preg_replace('/(<h3> Upgrade Notice <\/h3>)/', "<div class=\"nsw-hidden\">\n$1\n", $readme);
  $readme = $readme.'</div></div>';

  return $readme;
}

/**
 * README PARSER VERSION
 * @since 2.0
 **/
function nsw_readme_version ($nsw_url,$nsw_plugin_rep) {

  $readme  = fopen($nsw_url.''.$nsw_plugin_rep.'/readme.txt','r');
  $i = 0;
  while ($i < 7)
  { $version = fgets($readme);
    $i++;
  }

  fclose($readme);
  $version = str_replace("Stable tag: ", "", $version);
  return $version;
}

/**
 * OPTIONS ACTIVE SERVICE
 * @since 2.1
 **/
function nsw_active_service ($nsw_option,$nsw_option_value,$nsw_link) {
  
  echo '<div class="btn-group pull-right" data-toggle="buttons">';

  if ($nsw_option == 'post' && $nsw_option_value == '0')
  {
  echo '
  <label class="btn btn-default" onclick="window.open(\''.$nsw_link.'&nsw_i=on&nsw_active_option=post&nsw_active_option_value=1\',\'nsw_i\')">
  <input type="radio" name="options" id="inactive" autocomplete="off" > Active</label>
  <label class="btn btn-default active"><input type="radio" name="options" id="active" autocomplete="off" checked> Inactive</label>';
  }

  if ($nsw_option == 'post' && $nsw_option_value == '1')
  {
  echo '
  <label class="btn btn-success active"><input type="radio" name="options" id="active" autocomplete="off" checked> Active</label>
  <label class="btn btn-default" onclick="window.open(\''.$nsw_link.'&nsw_i=on&nsw_active_option=post&nsw_active_option_value=0\',\'nsw_i\')">
  <input type="radio" name="options" id="inactive" autocomplete="off" > Inactive</label>';
  }


  if ($nsw_option == 'cron' && $nsw_option_value == '0')
  {
  echo '
  <label class="btn btn-default" onclick="window.open(\''.$nsw_link.'&nsw_i=on&nsw_active_option=cron&nsw_active_option_value=1\',\'nsw_i\')">
  <input type="radio" name="options" id="inactive" autocomplete="off" > Active</label>
  <label class="btn btn-default active"><input type="radio" name="options" id="active" autocomplete="off" checked> Inactive</label>';
  }

  if ($nsw_option == 'cron' && $nsw_option_value == '1')
  {
  echo '
  <label class="btn btn-success active"><input type="radio" name="options" id="active" autocomplete="off" checked> Active</label>
  <label class="btn btn-default" onclick="window.open(\''.$nsw_link.'&nsw_i=on&nsw_active_option=cron&nsw_active_option_value=0\',\'nsw_i\')">
  <input type="radio" name="options" id="inactive" autocomplete="off" > Inactive</label>';
  }
  
  echo '</div>';

}


function nsw_active_service_icon ($nsw_option,$nsw_option_value) {
  
  if ($nsw_option == 'post' && $nsw_option_value == '0')
  {
  echo '<span style="color: rgb(128, 128, 146);" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
  }
  if ($nsw_option == 'post' && $nsw_option_value == '1')
  {
  echo '<span style="color: rgb(65, 150, 65);" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
  }
  if ($nsw_option == 'cron' && $nsw_option_value == '0')
  {
  echo '<span style="color: rgb(128, 128, 146);" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
  }
  if ($nsw_option == 'cron' && $nsw_option_value == '1')
  {
  echo '<span style="color: rgb(65, 150, 65);" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
  }

}

function nsw_active_service_next_cron ($nsw_option,$nsw_option_value) {
  
  if ($nsw_option == 'cron' && $nsw_option_value == '1')
  {
  global $wpdb;
  $query_next_time = $wpdb->get_results($wpdb->prepare( " SELECT * FROM $wpdb->options WHERE option_name = %s ", 'wp-full-auto-tags-manager_cron_time'));
  foreach ($query_next_time as $data) {
  echo '
  <div class="container-fluid nsw_padding_b5">
  <p>the next event is scheduled for ';
  echo $data->option_value;
  echo' (hourly)</p>
  </div>
  ';
  }

  }

}

?>