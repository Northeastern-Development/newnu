<?php

  register_taxonomy_for_object_type('category', 'Main Nav'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Main Nav');
  register_post_type('supernav', // Register Custom Post Type
    array(
    'labels' => array(
      'name' => __('Super Nav', 'nudev'), // Rename these to suit
      'singular_name' => __('Main Nav', 'nudev'),
      'add_new' => __('Add New', 'nudev'),
      'add_new_item' => __('Add New', 'nudev'),
      'edit' => __('Edit', 'nudev'),
      'edit_item' => __('Edit', 'nudev'),
      'new_item' => __('New Main Nav Item', 'nudev'),
      'view' => __('View Main Nav Items', 'nudev'),
      'view_item' => __('View Main Nav', 'nudev'),
      'search_items' => __('Search Main Nav', 'nudev'),
      'not_found' => __('No Main Nav items found', 'nudev'),
      'not_found_in_trash' => __('No Main Nav items found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => false,
    'supports' => array(
      'title'
      // ,
      // 'editor'
      // ,
      // 'excerpt'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => false, // Allows export in Tools > Export
  ));





  // Add columns to corporation post listing
  function add_supernav_acf_columns ( $columns ) {
    $slice1 = array_slice($columns, 0, 2, true);
    $slice2 = array_slice($columns, 2, count($columns), true);
    return array_merge($slice1,array('category' => __ ( 'Type' )),array('sub-type' => __ ( 'Sub-Type' )),array('status' => __ ( 'Status' )),$slice2);
  }


  function supernav_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'category':
        echo get_post_meta ( $post_id, 'category', true );
        break;
      case 'sub-type':
        echo get_post_meta ( $post_id, 'sub-type', true );
        break;
      case 'status':
        echo (get_post_meta ( $post_id, 'status', true ) === "1"?"Active":"");
        break;
    }
  }


  // add filter options
  function supernav_admin_posts_filter_restrict_manage_posts(){
    global $typenow;
    $type = 'supernav';

    if ($typenow == $type){


      $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
      $guide = '<option value="%s"%s>%s</option>';

      // hardcoded values for now, there is an issue retrieving them again after the first filter
      $typeValues = array(
        'Main Category' => 'Main Category'
        ,'About' => 'About'
        ,'Academics' => 'Academics'
        ,'Admissions' => 'Admissions'
        ,'Athletics' => 'Athletics'
        ,'Audience' => 'Audience'
        ,'Campus Activity' => 'Campus Activity'
        ,'Experiential Learning' => 'Experiential Learning'
        ,'Featured' => 'Featured'
        ,'Global' => 'Global'
        ,'Lifelong Learning' => 'Lifelong Learning'
        ,'Regional Campuses' => 'Regional Campuses'
        ,'Research' => 'Research'
      );

      $subtypeValues = array(
        'Alumni' => 'Alumni'
        ,'Current Student' => 'Current Student'
        ,'Employer Partner' => 'Employer Partner'
        ,'Faculty/Staff' => 'Faculty/Staff'
        ,'Future Student' => 'Future Student'
        ,'Journalist' => 'Journalist'
        ,'Parent' => 'Parent'
        ,'Prospective Faculty' => 'Prospective Faculty'
      );
  ?>
      <select name="ADMIN_FILTER_FIELD_VALUE-1"><option value=""><?php _e('Type', 'category'); ?></option>

  <?php

    // this will build the list of category options
      foreach ($typeValues as $label => $value){
        printf(
           $guide
          ,$value
          ,$value == $current_v? ' selected="selected"':''
          ,$label
        );
      }
  ?>
      </select>

      <select name="ADMIN_FILTER_FIELD_VALUE-2"><option value=""><?php _e('Sub Type', 'sub-type'); ?></option>

      <?php

      // this will build the list of category options
      foreach ($subtypeValues as $label => $value){
        printf(
           $guide
          ,$value
          ,$value == $current_v? ' selected="selected"':''
          ,$label
        );
      }
      ?>
      </select>

  <?php
    }
  }


  function supernav_posts_filter( $query ){
    global $pagenow;
    global $typenow;
    $type = 'supernav';
    if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && (isset($_GET['ADMIN_FILTER_FIELD_VALUE-1']) && $_GET['ADMIN_FILTER_FIELD_VALUE-1'] != '' || isset($_GET['ADMIN_FILTER_FIELD_VALUE-2']) && $_GET['ADMIN_FILTER_FIELD_VALUE-2'] != '')){
      if(isset($_GET['ADMIN_FILTER_FIELD_VALUE-1']) && $_GET['ADMIN_FILTER_FIELD_VALUE-1'] != ''){
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE-1'];
      }else if(isset($_GET['ADMIN_FILTER_FIELD_VALUE-2']) && $_GET['ADMIN_FILTER_FIELD_VALUE-2'] != ''){
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE-2'];
      }
    }
  }

  add_filter ( 'manage_supernav_posts_columns', 'add_supernav_acf_columns' );
  add_action ( 'manage_supernav_posts_custom_column', 'supernav_custom_column', 10, 2 );

  add_action( 'restrict_manage_posts', 'supernav_admin_posts_filter_restrict_manage_posts' );
  add_filter( 'parse_query', 'supernav_posts_filter' );

?>
