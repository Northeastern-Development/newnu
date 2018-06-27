<?php
/**
 * Plugin Name: NU Content
 * Plugin URI: http://brand.northeastern.edu/wp/plugins/content
 * Description: This plugin adds the ability to use specific shortcodes to pull in global university system content to your site.  ex: [placeGlobalContent content="privacy-policy"]
 * Version: 1.0.0
 * Author: Northeastern University System
 * Author URI: http://www.northeastern.edu/externalaffairs/
 * License: GPL2
 */





 /* ***********************************************************************

 FUNCTION: placeGlobalContent

 Description
 This function will allow users to add a shortcode to their page content
 to request and receive glbal content back from the EDU API

 Inputs:
 shortcode usage = [placeGlobalContent content=""]

 Outputs:
 HTML content

 *********************************************************************** */
 function placeGlobalContent($atts){

   // Attributes
   $atts = shortcode_atts(
     array(
       'content' => ''
     ),
     $atts
   );

   if($atts['content'] != ''){ // the shortcode has a content value to go and find


     // grab the content from the main edu site
     $url = 'https://www.northeastern.edu/resources/global-content/?r='.$atts['content'].'&cache=no'; // force no cache!!!!
     $curl = curl_init($url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
     $return = curl_exec($curl); // this sets the value to return the replace the shortcode
     curl_close($curl);


   }else{  // no content value was specified so we need to error
     $return = 'ERROR: No content selected, please update your shortcode like this:<br /><br />[placeGlobalContent content="requested content"]';
   }

   return $return;

 }
 /* END FUNCTION ******************************************************** */





 add_shortcode('placeGlobalContent','placeGlobalContent');

?>
