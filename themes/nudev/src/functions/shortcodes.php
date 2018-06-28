<?php
  // this is a file to add any custom shortcodes needed for a specific site

  /* ***********************************************************************

  CLASS: NULocalContent

  Description
  This function will allow users to add a shortcode to their page content
  to display consistent content

  Inputs:
  shortcode usage = [nu-placelocalcontent content="post slug"]

  Outputs:
  HTML content

  *********************************************************************** */
  class NULocalContent{

    // initialize the custom shortcode object
    public function __construct(){
      add_shortcode('nu-placelocalcontent', array($this, 'shortcode'));
    }

    // handle the actual shortcode request for content
    public function shortcode($atts){
      return $this->grabContent($this->attributes($atts)['content']);
    }

    // this method will actually grab the requested content, if any, or error
    private function grabContent($a){

      if($a != ''){ // a content request was actually made, so let's go grab the content from source

        wp_reset_query();

        $args = array(
          'name'        => $a,
          'post_type'   => 'globalcontent',
          'numberposts' => 1
        );

        return get_fields(get_posts($args)[0]->ID)['content'];

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

 $NU_localContent = new NULocalContent(); // initialize a new local content object

 /* END CLASS *********************************************************** */

?>
