<?php

  $field = get_field_object('field_5a5e2ca106a03'); // this gets the select options within the ACF field
  // print_r($field);

  register_taxonomy_for_object_type('category', 'Administration'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Administration');
  register_post_type('administration', // Register Custom Post Type
    array(
    'labels' => array(
      'name' => __('Administration', 'nudev'), // Rename these to suit
      'singular_name' => __('Administration', 'nudev'),
      'add_new' => __('Add New', 'nudev'),
      'add_new_item' => __('Add New', 'nudev'),
      'edit' => __('Edit', 'nudev'),
      'edit_item' => __('Edit', 'nudev'),
      'new_item' => __('New Administration Member', 'nudev'),
      'view' => __('View Administration', 'nudev'),
      'view_item' => __('View Administration', 'nudev'),
      'search_items' => __('Search Administration', 'nudev'),
      'not_found' => __('No Administration found', 'nudev'),
      'not_found_in_trash' => __('No Administration found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => false,
    'rewrite' => array(
      'with_front' => false,
      'slug'       => 'alerts'
    ),
    'supports' => array(
      'title',
      'editor',
      'excerpt'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => false, // Allows export in Tools > Export
  ));

  // Add columns to administration post listing
  function add_administration_acf_columns ( $columns ) {
    $slice1 = array_slice($columns, 0, 2, true);
    $slice2 = array_slice($columns, 2, count($columns), true);
    return array_merge($slice1,array('type' => __ ( 'Type' )),array('department' => __ ( 'Department' )),array('sub-type' => __ ( 'Sub-Type' )),$slice2);
  }


  function administration_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'department':
        $depts = get_post_meta ( $post_id, 'department', true );
        // print_r($depts);
        // if(count($depts) > 1){ // they are in more than one dept
        if(gettype($depts) == "array"){ // they are in more than one dept
          $v = '';
          foreach($depts as $d){  // loop through and grab each department that this person is part of
            $v .= ($v != ''?', '.$d:$d);
          }
          echo $v;
        }else{  // they are only in one dept
          // echo $depts[0];
          echo $depts;
        }
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
  function administration_filter_by_department( $query ){
    global $typenow;
    global $field;

      $current_v = isset($_GET['ADMIN_FILTER_DEPT_VALUE'])? $_GET['ADMIN_FILTER_DEPT_VALUE']:'';

      $guide = '<option value="%s"%s>%s</option>';
      $values = $field['choices'];  // grab the choices from the system rather than hard-coding

?>
      <select name="ADMIN_FILTER_DEPT_VALUE"><option value=""><?php _e('Filter By Department', 'department'); ?></option>

<?php

      foreach ($values as $label => $value){

        echo sprintf(
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


  function administration_department_filter( $query ){
    global $pagenow;
    global $typenow;
    $type = 'administration';
    if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_DEPT_VALUE']) && $_GET['ADMIN_FILTER_DEPT_VALUE'] != ''){

      // this is so that we can fuzzy find a match even if the profile is in more than 1 dept.
      $query->set('meta_query',array(
        array(
          'key' => 'department'
          ,'value' => $_GET['ADMIN_FILTER_DEPT_VALUE']
          ,'compare' => 'LIKE'
        )
      ));

    }
  }




  function administration_filter_by_type( $query ){
    global $typenow;
    global $field;

      $current_v = isset($_GET['ADMIN_FILTER_TYPE_VALUE'])? $_GET['ADMIN_FILTER_TYPE_VALUE']:'';

      $guide = '<option value="%s"%s>%s</option>';

      $values = array(
         'Department' => 'Department'
        ,'Individual' => 'Individual'
      );
  ?>
      <select name="ADMIN_FILTER_TYPE_VALUE"><option value=""><?php _e('Filter By Type', 'type'); ?></option>

  <?php

      foreach ($values as $label => $value){

        echo sprintf(
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



  function administration_specific_filters( $query ){
    // if(is_admin()){
    global $pagenow;
    global $typenow;
    $type = 'administration';

    $administration_queries = array();

    if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_TYPE_VALUE']) && $_GET['ADMIN_FILTER_TYPE_VALUE'] != ''){

      $administration_queries[] = array(
        'key' => 'type'
        ,'value' => $_GET['ADMIN_FILTER_TYPE_VALUE']
        ,'compare' => 'LIKE'
      );
    }

    if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_DEPT_VALUE']) && $_GET['ADMIN_FILTER_DEPT_VALUE'] != ''){

      $administration_queries[] = array(
        'key' => 'department'
        ,'value' => $_GET['ADMIN_FILTER_DEPT_VALUE']
        ,'compare' => 'LIKE'
      );
    }

    // run the meta query
    $query->set('meta_query',$administration_queries);
  }


// if(is_admin()){ // we only care aabout this running within the admin tools side of the site
  add_filter ( 'manage_administration_posts_columns', 'add_administration_acf_columns' );
  add_action ( 'manage_administration_posts_custom_column', 'administration_custom_column', 10, 2 );

  add_action( 'restrict_manage_posts', 'administration_filter_by_department' );
  add_action( 'restrict_manage_posts', 'administration_filter_by_type' );
  add_filter( 'parse_query', 'administration_specific_filters' );
// }

?>
