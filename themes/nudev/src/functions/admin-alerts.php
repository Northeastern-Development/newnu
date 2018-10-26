<?php
  register_taxonomy_for_object_type('category', 'Campus Alerts'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Campus Alerts');
  register_post_type('nualerts', // Register Custom Post Type
      array(
      'labels' => array(
          'name' => __('Campus Alerts', 'nudev'), // Rename these to suit
          'singular_name' => __('NU Alerts', 'nudev'),
          'add_new' => __('Add New', 'nudev'),
          'add_new_item' => __('Add New', 'nudev'),
          'edit' => __('Edit', 'nudev'),
          'edit_item' => __('Edit', 'nudev'),
          'new_item' => __('New Alert', 'nudev'),
          'view' => __('View Alert', 'nudev'),
          'view_item' => __('View Alert', 'nudev'),
          'search_items' => __('Search NU Alerts', 'nudev'),
          'not_found' => __('No NU Alerts found', 'nudev'),
          'not_found_in_trash' => __('No NU Alerts found in Trash', 'nudev')
      ),
      'public' => true,
      'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
      'has_archive' => false,
      'supports' => array(
          'title',
          'editor',
          'excerpt'
      ),
      'can_export' => false,
  ));

  // Add columns to alerts post listing
  function add_nualerts_acf_columns ( $columns ) {
    $slice1 = array_slice($columns, 0, 2, true);
    $slice2 = array_slice($columns, 2, count($columns), true);
    return array_merge($slice1,array('active' => __ ( 'Active?' )),array('affected_campus' => __ ( 'Affected Campus(es)' )),$slice2);
  }


  function nualerts_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'active':
        echo (get_post_meta ( $post_id, 'active', true ) === "1"?"YES":"NO");
        break;
      case 'affected_campus':
        $list = "";
        foreach(get_post_meta ( $post_id, 'affected_campus', true ) as $r){
          $list .= ($list != ""?", ":"").get_the_title($r);
        }
        echo $list;
        break;
    }
  }




  if(is_admin()){ // we only want to activate these if we are in the admin area
    add_filter ( 'manage_nualerts_posts_columns', 'add_nualerts_acf_columns' );
    add_action ( 'manage_nualerts_posts_custom_column', 'nualerts_custom_column', 10, 2 );
  }





  // this is a class to gather up the alerts and display them
  class NUAlerts{

    var $alerts;

    public function __construct(){
      $this->alerts = $this->getData();
		}

    private function getData():array{

      wp_reset_postdata();
    	wp_reset_query();

      $args = array(
    		 "post_type" => "nualerts"
    		,'meta_query' => array(
    			 'relation' => 'AND'
    			,array("key"=>"active","value"=>"1",""=>"=")
    		)
    	);
      return query_posts($args);
    }

    function buildAlerts():string{

      if(count($this->alerts) > 0){

        // $return = "<div><h2>University Alert!</h2><p>The Northeastern University System has issued the following alert(s).  Please be sure to read any associated information and contact your campus emergency services with any questions.</p><ul>";

        $return = "<div><h2>University Alert!</h2><p>The Northeastern University System has issued the following alert(s).</p><ul>";

        $guide = '<li><a href="%s" title="%s, read more">%s For: %s - %s - Read More</a></li>';

        foreach($this->alerts as $a){
          $return .= sprintf(
    				$guide
    				,$a->guid
    				,$a->post_title
    				,$a->post_title
    				,$this->buildCampusList(get_field('affected_campus',$a->ID))
    				,$a->post_excerpt
    			);
        }

        unset($guide,$a,$this->alerts);

        return '<div id="nu__alerts">'.$return.'</ul></div></div>';

      }else{
        unset($this->alerts);
        return '';
      }

    }

    private function buildCampusList($a=''):string{
      $return = '';
      foreach($a as $c){
        $return .= ($return != ""?', ':'').$c->post_title;
      }
      return $return;
    }

  }

  if(!is_admin()){  // we only want to gather up the data if we are NOT in the admin area
    function getAlerts(){ // this is a hold-ver from the old logic that will need to be replaced
      $activeAlerts = new NUAlerts();
      return $activeAlerts->buildAlerts();
    }
  }else{  // this will start functions specific to the admin side of things
    // $activeAlerts = new NUAlerts();
    // $activeAlerts->adminTools();
  }

?>
