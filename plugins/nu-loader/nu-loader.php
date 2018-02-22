<?php
/**
 * Plugin Name: NU Loader
 * Plugin URI: http://brand.northeastern.edu/wp/plugins/loader
 * Description: This plugin adds global university system functionality to your site, including: styles, super nav, utility nav, and footer.  If needed, this plugin will automatically add custom hooks to various locations within your sites theme files.  This is to allow custom content to be delivered and shown according to university brand guidelines.
 * Version: 1.0.0
 * Author: Northeastern Univerity System
 * Author URI: http://www.northeastern.edu/externalaffairs/
 * License: GPL2
 */


// specify base urls to be used in the code below to speed up making edits
// $baseUrls = array('http://newnu.local');
//
// echo get_site_url();

$baseUrls = array(get_site_url());







/* ***********************************************************************

FUNCTION: nu_check_plugin

Description
This function will check to ensure that the proper custom hooks are in
place within the template files of the site and add them if needed.

Inputs:
NA

Outputs:
updated wp theme files

*********************************************************************** */
function nu_check_plugin(){

  // check for the custom header hook and add it if needed
  if(!has_action('wp_header', 'nu_header_block')){

    echo "WARNING: you need to reload your page now for the NU Loader plugin to be fully activated.";

    // we need to read the header.php file into memory to save the contents
    $p = get_template_directory()."/header.php";
    $f = fopen($p, "r") or die("Unable to open file!");
    $d = fread($f,filesize($p));
    fclose($f);

    // add in the custom hook by updating the code of header.php
    $d = str_replace('<header role="banner">','<header role="banner"><?php if(function_exists("wp_header")){wp_header();} ?>',$d);
    $f = fopen($p, "w+") or die("Unable to open file!");
    fwrite($f,$d);
    fclose($f);

  }

}
/* END FUNCTION ******************************************************** */










// function nu_styles(){
//   echo '<!-- this would load stylesheet calls -->';
// }
// wp_enqueue_style( 'nustyles', $plugin_url . 'css/style1.css' );


// load google analytics and tag manager via this plugin as well?


// function nu_scripts(){
//   echo '<!-- this would load script calls -->';
// }




/* ***********************************************************************

FUNCTION: nu_header_content

Description
This function will check to ensure that the proper custom hooks are in
place within the template files of the site and add them if needed.

Inputs:
NA

Outputs:
updated wp theme files

*********************************************************************** */
function nu_header_block(){

  global $baseUrls;

  // let's grab the utility nav from home base
  $url = $baseUrls[0]."/resources/includes/?r=utility-nav";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  $utility = curl_exec($curl);
  curl_close($curl);

  // let's grab the alerts (if any) from home base
  $url = $baseUrls[0]."/feed/alerts";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  $xml = curl_exec($curl);
  curl_close($curl);
  $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
  $json = json_encode($xml);
  $res = json_decode($json,TRUE)['channel']['items'];
  $alerts = '';

// if we have alerts, build out the alerts panel
  if(!isset($res[0])){
    $alerts .= '<div><h2>University Alert!</h2><p>The Northeastern University System has issued the following alert(s).  Please be sure to read any associated information and contact your campus emergency services with any questions.</p><ul>';

    foreach($res as $r){
      $guide = '<li><a href="%s" title="%s, read more">%s For: %s - %s - Read More</a></li>';

			$campus = "";
      $campuses = explode(", ",$r['campuses']);
			foreach($campuses as $c){
				$campus .= ($campus != ""?", ":"").$c;
			}

			$alerts .= sprintf(
				 $guide
				,$r['link']
				,$r['title']
				,$r['title']
				,$campus
				,$r['description']
			);
    }
    $alerts .= '</ul></div>';
  }

  echo $utility.'<div id="nu__alerts">'.$alerts.'</div>';

  wp_reset_postdata();
	wp_reset_query();
}
/* END FUNCTION ******************************************************** */






/* ***********************************************************************

FUNCTION: nu_global_footer

Description
This function will make a call to the resource center on edu and echo the
returned footer content to the footer area of the page

Inputs:
NA

Outputs:
HTML content

*********************************************************************** */
function nu_global_footer(){

  // need a back up of local content in case the resource cannot be reached for some reason

  global $baseUrls;

  $url = $baseUrls[0]."/resources/includes/?r=footer";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  echo curl_exec($curl);
  curl_close($curl);

}
/* END FUNCTION ******************************************************** */

// this will add a monitor tag to the header for tracking purposes
function nu_set_keys(){
  // echo '<!-- NU Global Footer, v1.0.0 [key:'.md5(get_home_url().'-footer-'.date("Ymd")).'] -->';
}




// need a better, more tamper-resistant way to provide tracking and monitoring abilities


// set up the custom hook for the header area
function wp_header(){
  add_action('wp_header', 'nu_header_block');
	do_action('wp_header');
}



// add the action to calls to the main wp functions file
// add_action('wp_head','nu_styles');
// add_action('wp_head','nu_scripts');
// add_action('wp_head','nu_set_keys');
// add_action('wp_footer','nu_global_footer');





// let's check the plugin to make sure that we have everything we need
if(!is_admin()){
  add_action('wp_footer','nu_check_plugin');
}
