<?php

/* **********************************************************************
Page Conditional Styling
********************************************************************** */
function nudev_conditional_styles(){

  // load the base styles if we are NOT in an admin page
  if(!is_admin()){
    wp_register_style('nudevcss', get_template_directory_uri() . '/css/style.css', array(), '1.0');
    wp_enqueue_style('nudevcss');
  }


  // load homepage styles
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
  if(is_page_template('templates/template-static.php') || is_page_template('templates/template-experience.php') || is_page_template('templates/template-colleges.php') || is_page_template('templates/template-departments.php') || is_page_template('templates/template-administration.php') || is_page_template('templates/template-trustees.php') || is_page_template('templates/template-institutes.php') || is_404()){
    wp_register_style('staticcss', get_template_directory_uri() . '/css/static.css', array(), '1.0');
    wp_enqueue_style('staticcss');
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
  if(is_page_template('templates/template-colleges.php') || is_page_template('templates/template-institutes.php')){
    wp_register_style('collegescss', get_template_directory_uri() . '/css/colleges.css', array(), '1.0');
    wp_enqueue_style('collegescss');
  }


  // load departments and programs page styles
  if(is_page_template('templates/template-departments.php')){
    wp_register_style('departmentscss', get_template_directory_uri() . '/css/departments.css', array(), '1.0');
    wp_enqueue_style('departmentscss');
  }


  // load administration page styles
  if(is_page_template('templates/template-administration.php')){
    wp_register_style('administrationcss', get_template_directory_uri() . '/css/administration.css', array(), '1.0');
    wp_enqueue_style('administrationcss');
  }


  // load trustees page styles
  if(is_page_template('templates/template-trustees.php')){
    wp_register_style('trusteescss', get_template_directory_uri() . '/css/trustees.css', array(), '1.0');
    wp_enqueue_style('trusteescss');
  }


  // load 404 page styles
  if(is_404()){
    wp_register_style('404css', get_template_directory_uri() . '/css/404.css', array(), '1.0');
    wp_enqueue_style('404css');
  }

}

/* ******************************************************************* */

?>
