<?php

  register_taxonomy_for_object_type('category', 'Global Content'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Global Content');
  register_post_type('globalcontent', // Register Custom Post Type
    array(
    'labels' => array(
      'name' => __('Global Content', 'nudev'), // Rename these to suit
      'singular_name' => __('Global Content', 'nudev'),
      'add_new' => __('Add New', 'nudev'),
      'add_new_item' => __('Add New', 'nudev'),
      'edit' => __('Edit', 'nudev'),
      'edit_item' => __('Edit', 'nudev'),
      'new_item' => __('New Global Content', 'nudev'),
      'view' => __('View Global Content', 'nudev'),
      'view_item' => __('View Global Content', 'nudev'),
      'search_items' => __('Search Global Content', 'nudev'),
      'not_found' => __('No Global Content found', 'nudev'),
      'not_found_in_trash' => __('No Global Content found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => false,
    'supports' => array(
      'title'
      ,'author'
      // ,
      // 'editor'
      // ,
      // 'excerpt'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => false, // Allows export in Tools > Export
  ));

  // Add columns to administration post listing
  function add_globalcontent_acf_columns ( $columns ) {
    $slice1 = array_slice($columns, 0, 2, true);
    $slice2 = array_slice($columns, 2, count($columns), true);
    return array_merge($slice1,array('type' => __ ( 'Type' )),array('department' => __ ( 'Department' )),array('sub-type' => __ ( 'Sub-Type' )),$slice2);
  }


  function globalcontent_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'department':
        echo get_post_meta ( $post_id, 'department', true ).(get_post_meta ( $post_id, 'department_head', true ) === "1"?" (Department Head)":"");
        break;
      case 'type':
        echo get_post_meta ( $post_id, 'type', true );
        break;
      case 'sub-type':
        echo get_post_meta ( $post_id, 'sub_type', true );
        break;
    }
  }

  // add filter options
  function globalcontent_admin_posts_filter_restrict_manage_posts(){
    global $typenow;
    $type = 'globalcontent';

    if ($typenow == $type){

      // get the full list of departments from the acf fields
      //$field = get_field_object('field_5a5e2ca106a03');
      //print_r($field['choices']);
      // $values = $field['choices'];


      $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
      $guide = '<option value="%s"%s>%s</option>';

      // hardcoded values for now, there is an issue retrieving them again after the first filter
      $values = array(
         'Advancement' => 'Advancement'
        ,'External Affairs' => 'External Affairs'
        ,'Finance' => 'Finance'
        ,'General Counsel' => 'General Counsel'
        ,'President' => 'President'
        ,'Professional Advancement Network' => 'Professional Advancement Network'
        ,'Provost' => 'Provost'
        ,'Strategy' => 'Strategy'
      );
?>
      <select name="ADMIN_FILTER_FIELD_VALUE"><option value=""><?php _e('Filter By Department', 'department'); ?></option>

<?php

      foreach ($values as $label => $value){
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


  function globalcontent_posts_filter( $query ){
    global $pagenow;
    global $typenow;
    $type = 'globalcontent';
    if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != ''){
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
  }

  // add_filter ( 'manage_administration_posts_columns', 'add_administration_acf_columns' );
  // add_action ( 'manage_administration_posts_custom_column', 'administration_custom_column', 10, 2 );
  //
  // add_action( 'restrict_manage_posts', 'administration_admin_posts_filter_restrict_manage_posts' );
  // add_filter( 'parse_query', 'administration_posts_filter' );

?>
