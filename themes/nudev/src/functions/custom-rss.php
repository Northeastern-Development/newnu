<?php

  add_action('init', 'customRSS');
  function customRSS(){

    add_feed('campuses', 'campusesRSSFunc');
    add_feed('collegelist', 'collegesRSSFunc');
    add_feed('corporation', 'corporationRSSFunc');
    add_feed('administration', 'administrationRSSFunc');
    add_feed('alerts', 'alertsRSSFunc');
    add_feed('supernav', 'supernavRSSFunc');
    add_feed('departmentsandprograms', 'departmentsandprogramsRSSFunc');

  }



  // campuses
  function campusesRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-campuses.php' );
  }

  // colleges
  function collegesRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-college.php' );
  }

  // corporation
  function corporationRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-corporation.php' );
  }

  // administration
  function administrationRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-administration.php' );
  }

  // alerts
  function alertsRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-alerts.php' );
  }

  // university main menu
  function supernavRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-supernav.php' );
  }

  // university departments and programs
  function departmentsandprogramsRSSFunc(){
    header( 'Content-Type: application/rss+xml; charset=' . get_option( 'blog_charset' ), true );
    require_once( get_template_directory() . '/templates/rss/rss-departmentsandprograms.php' );
  }

?>
