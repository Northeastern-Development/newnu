<?php

/* **********************************************************************
Page Conditional Styling
********************************************************************** */
function nudev_conditional_styles(){

  // load the base styles
  wp_register_style('nudevcss', get_template_directory_uri() . '/css/style.css', array(), '1.0');
  wp_enqueue_style('nudevcss');


  // any page that is NOT search
  // if(get_query_var('s') != ""){
  //   //echo "SEARCH RESULT: ".$_GET['s'];
  //   wp_register_style('searchcss', get_template_directory_uri() . '/css/category.css', array(), '1.0');
  //   wp_enqueue_style('searchcss');
  // }


  // 404 page
  if(is_404()){
    wp_register_style('404css', get_template_directory_uri() . '/css/static.css', array(), '1.0');
    wp_enqueue_style('404css');
  }


  // load homepage styles
  if(is_page('')){
    wp_register_style('homepagecss', get_template_directory_uri() . '/css/homepage.css', array(), '1.0');
    wp_enqueue_style('homepagecss');
  }


  // load the category styles
  // if(is_page_template('templates/template-category.php')){
  //   wp_register_style('categorycss', get_template_directory_uri() . '/css/category.css', array(), '1.0');
  //   wp_enqueue_style('categorycss');
  // }


  // load the article style: editorial
  // if(is_page_template('templates/single-editorial.php')){
  //   wp_register_style('editorialcss', get_template_directory_uri() . '/css/editorial.css', array(), '1.0');
  //   wp_enqueue_style('editorialcss');
  // }


  // load the article style: multi-panel
  // if(is_page_template('templates/single-panels.php')){
  //   wp_register_style('panelscss', get_template_directory_uri() . '/css/panels.css', array(), '1.0');
  //   wp_enqueue_style('panelscss');
  // }


  // load the article style: multimedia
  // if(is_page_template('templates/single-media.php')){
  //   wp_register_style('magnificcss', get_template_directory_uri() . '/css/magnific.css', array(), '1.0');
  //   wp_enqueue_style('magnificcss');
  //   wp_register_style('multimediacss', get_template_directory_uri() . '/css/multimedia.css', array(), '1.0');
  //   wp_enqueue_style('multimediacss');
  // }


  // load generic styles for the various department landing pages
  if(is_page_template(array('templates/template-marketing.php','templates/template-communications.php','templates/template-govrelations.php','templates/template-resources.php','templates/template-contact.php','templates/template-staff.php'))){
    wp_register_style('landingcss', get_template_directory_uri() . '/css/landing.css', array(), '1.0');
    wp_enqueue_style('landingcss');
  }


  // this is the government relations page styles
  if(is_page_template('templates/template-govrelations.php')){
    wp_register_style('governmentcss', get_template_directory_uri() . '/css/government.css', array(), '1.0');
    wp_enqueue_style('governmentcss');
  }


  // this is the government relations page styles
  if(is_page_template('templates/template-communications.php')){
    wp_register_style('communicationscss', get_template_directory_uri() . '/css/communications.css', array(), '1.0');
    wp_enqueue_style('communicationscss');
  }


  // this is the staff page styles
  if(is_page_template('templates/template-staff.php')){
    wp_register_style('staffcss', get_template_directory_uri() . '/css/staff.css', array(), '1.0');
    wp_enqueue_style('staffcss');
    wp_register_style('magnificcss', get_template_directory_uri() . '/css/magnific.css', array(), '1.0');
    wp_enqueue_style('magnificcss');
  }


  // this is the contact page styles
  if(is_page_template('templates/template-contact.php')){
    wp_register_style('contactcss', get_template_directory_uri() . '/css/contact.css', array(), '1.0');
    wp_enqueue_style('contactcss');
  }





  // load the styles for the class notes pages
  // if(is_page_template(array('templates/template-classnotes.php'))){
  //   wp_register_style('classnotes', get_template_directory_uri() . '/css/classnotes.css', array(), '1.0');
  //   wp_enqueue_style('classnotes');
  // }


  // this is for search results within class notes
  // if(isset($_GET['s']) && isset($_GET['post_type']) && $_GET['post_type'] === "classnotes"){
  //   wp_register_style('classnotes', get_template_directory_uri() . '/css/classnotes.css', array(), '1.0');
  //   wp_enqueue_style('classnotes');
  // }

}

/* ******************************************************************* */

?>
