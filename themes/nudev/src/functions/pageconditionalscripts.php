<?php

/* **********************************************************************
Page Conditional Scripts
********************************************************************** */
function nudev_conditional_scripts(){


  if(is_page('')){
    wp_register_script('mousewheeljs', get_template_directory_uri() . '/js/jquery.mousewheel-min.js', array(), '1.0.0');
    wp_enqueue_script('mousewheeljs');
    wp_register_script('hammerjs', get_template_directory_uri() . '/js/hammer-min.js', array(), '1.0.0');
    wp_enqueue_script('hammerjs');
  }


}

/* ******************************************************************* */

?>
