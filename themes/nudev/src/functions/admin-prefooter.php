<?php

  register_taxonomy_for_object_type('category', 'Prefooter'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Prefooter');
  register_post_type('prefooter', // Register Custom Post Type
    array(
    'labels' => array(
      'name' => __('Prefooter', 'nudev'), // Rename these to suit
      'singular_name' => __('Prefooter', 'nudev'),
      'add_new' => __('Add New', 'nudev'),
      'add_new_item' => __('Add New', 'nudev'),
      'edit' => __('Edit', 'nudev'),
      'edit_item' => __('Edit', 'nudev'),
      'new_item' => __('New Prefooter Item', 'nudev'),
      'view' => __('View Prefooter Item', 'nudev'),
      'view_item' => __('View Prefooter Item', 'nudev'),
      'search_items' => __('Search Prefooters', 'nudev'),
      'not_found' => __('No Prefooters found', 'nudev'),
      'not_found_in_trash' => __('No Prefooters found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => false,
    // 'rewrite' => array(
    //   'with_front' => false,
    //   'slug'       => 'alerts'
    // ),
    'supports' => array(
      'title',
      'editor',
      'excerpt'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => false, // Allows export in Tools > Export
  ));






  // we only want to show specific types of posts here cross-linked from the prefooter items, based on selection of type
  function update_acf_post_object_field_choices($title,$post,$field,$post_id){

    $fFP = get_post(get_post($field['parent'])->post_parent);

    if($fFP->post_excerpt === 'pre-footer_'.strtolower(get_metadata('post', $post->ID, 'type')[0]).'_block'){
      return $title;
    }else{
      return $title.' --------- Incompatible Type';
    }
  }



  // Add columns to administration post listing
  function add_prefooter_acf_columns ( $columns ) {
    $slice1 = array_slice($columns, 0, 2, true);
    $slice2 = array_slice($columns, 2, count($columns), true);
    return array_merge($slice1,array('type' => __ ( 'Type' )),$slice2);
  }


  function prefooter_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'type':
        echo get_post_meta ( $post_id, 'type', true );
        break;
    }
  }

  // add filter options
  function prefooter_admin_posts_filter_restrict_manage_posts(){
    global $typenow;
    $type = 'prefooter';

    if ($typenow == $type){

      $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
      $guide = '<option value="%s"%s>%s</option>';

      // hardcoded values for now, there is an issue retrieving them again after the first filter
      $values = array(
         'Image' => 'Image'
        ,'Link' => 'Link'
        ,'Text' => 'Text'
      );
  ?>
      <select name="ADMIN_FILTER_FIELD_VALUE"><option value=""><?php _e('Filter By Type', 'type'); ?></option>

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


  function prefooter_posts_filter( $query ){
    global $pagenow;
    global $typenow;
    $type = 'prefooter';
    if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != ''){
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
  }

  add_filter ( 'manage_prefooter_posts_columns', 'add_prefooter_acf_columns' );
  add_action ( 'manage_prefooter_posts_custom_column', 'prefooter_custom_column', 10, 2 );

  add_action( 'restrict_manage_posts', 'prefooter_admin_posts_filter_restrict_manage_posts' );
  add_filter( 'parse_query', 'prefooter_posts_filter' );

  add_filter( 'acf/fields/post_object/result', 'update_acf_post_object_field_choices', 100, 4 );

?>
