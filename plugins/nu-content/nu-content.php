<?php
  /*
  * Plugin Name: NU Global Content
  * Plugin URI: http://brand.northeastern.edu/wp/plugins/content
  * Description: This plugin adds the ability to use specific shortcodes to pull in global university system content to your site.  ex: [nu-placeglobalcontent content="post slug"]
  * Version: 1.0.0
  * Author: Northeastern University System
  * Author URI: http://www.northeastern.edu/externalaffairs/
  * License: GPL2
  */





  /* ***********************************************************************

  CLASS: NUGlobalContent

  Description
  This function will allow users to add a shortcode to their page content
  to request and receive glbal content back from the EDU API

  Inputs:
  shortcode usage = [nu-placeglobalcontent content="post slug"]

  Outputs:
  HTML content

  *********************************************************************** */
  class NUGlobalContent{

    // initialize the custom shortcode object
    public function __construct(){
      add_shortcode('nu-placeglobalcontent', array($this, 'shortcode'));
    }

    // handle the actual shortcode request for global content
    public function shortcode($atts){
      return $this->grabContent($this->attributes($atts)['content']);
    }

    // this method will actually go out and grab the requested content, if any
    private function grabContent($a){

      if($a != ''){ // a content request was actually made, so let's go grab the content from source

        $curl = curl_init('https://www.northeastern.edu/resources/global-content/?r='.$a.'&cache=no');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($curl);
        curl_close($curl);

        unset($curl);

        return $return;

        unset($return);

      }else{  // no content was requested, so return a simple error
        return 'ERROR: No content selected, please update your shortcode';
      }
    }

    // this method will determine attributes being passed in and set default values if needed
    private function attributes($a){
      return shortcode_atts(
        array(
          'content' => ''
        )
        ,$a
      );
    }
  }

 $NU_globalContent = new NUGlobalContent(); // initialize a new global content object

 /* END CLASS *********************************************************** */

?>
