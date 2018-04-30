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


  // load 404 page styles
  if(is_404()){
    wp_register_style('404css', get_template_directory_uri() . '/css/static.css', array(), '1.0');
    wp_enqueue_style('404css');
  }


  // load homepage styles
  // if(is_page('')){
  if(is_page_template('templates/template-homepage.php')){
    wp_register_style('homepagecss', get_template_directory_uri() . '/css/homepage.css', array(), '1.0');
    wp_enqueue_style('homepagecss');
  }


  // load search styles
  if(is_page_template('templates/template-search.php')){
    wp_register_style('searchcss', get_template_directory_uri() . '/css/search.css', array(), '1.0');
    wp_enqueue_style('searchcss');
  }


  // load static page styles
  if(is_page_template('templates/template-static.php') || is_page_template('templates/template-experience.php') || is_page_template('templates/template-colleges.php') || is_page_template('templates/template-departments.php')){
  // if(is_page('emergency-information')){
    wp_register_style('staticcss', get_template_directory_uri() . '/css/static.css', array(), '1.0');
    wp_enqueue_style('staticcss');
    // wp_register_style('emergencycss', get_template_directory_uri() . '/css/emergency.css', array(), '1.0');
    // wp_enqueue_style('emergencycss');
  }


  // load static page styles to alert template
  if(get_post_type() == 'nualerts'){
    wp_register_style('staticcss', get_template_directory_uri() . '/css/static.css', array(), '1.0');
    wp_enqueue_style('staticcss');
  }


  // load experience page styles
  if(is_page_template('templates/template-experience.php')){
    wp_register_style('experiencecss', get_template_directory_uri() . '/css/experience.css', array(), '1.0');
    wp_enqueue_style('experiencecss');
  }

  // load colleges and schools page styles
  if(is_page_template('templates/template-colleges.php')){
    wp_register_style('collegescss', get_template_directory_uri() . '/css/colleges.css', array(), '1.0');
    wp_enqueue_style('collegescss');
  }


  // load departments and programs page styles
  if(is_page_template('templates/template-departments.php')){
    wp_register_style('departmentscss', get_template_directory_uri() . '/css/departments.css', array(), '1.0');
    wp_enqueue_style('departmentscss');
  }

}

/* ******************************************************************* */

?>
