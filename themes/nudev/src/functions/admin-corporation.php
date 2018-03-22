<?php

register_taxonomy_for_object_type('category', 'Corporation'); // Register Taxonomies for Category
register_taxonomy_for_object_type('post_tag', 'Corporation');
register_post_type('corporation', // Register Custom Post Type
    array(
    'labels' => array(
        'name' => __('Corporation', 'nudev'), // Rename these to suit
        'singular_name' => __('Corporation', 'nudev'),
        'add_new' => __('Add New', 'nudev'),
        'add_new_item' => __('Add New', 'nudev'),
        'edit' => __('Edit', 'nudev'),
        'edit_item' => __('Edit', 'nudev'),
        'new_item' => __('New Corporation Member', 'nudev'),
        'view' => __('View Corporation', 'nudev'),
        'view_item' => __('View Corporation', 'nudev'),
        'search_items' => __('Search Corporation', 'nudev'),
        'not_found' => __('No Corporation found', 'nudev'),
        'not_found_in_trash' => __('No Corporation found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => false,
    'rewrite' => array(
        'with_front' => false,
        'slug'       => 'alerts'
    ),
    'supports' => array(
        'title'
        ,
        // 'editor',
        // 'excerpt'
        // 'thumbnail'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => false, // Allows export in Tools > Export
    // 'taxonomies' => array(
    //   // 'active'
    //     'post_tag',
    //     'category'
    // ) // Add Category and Post Tags support
));

// Add columns to corporation post listing
function add_corporation_acf_columns ( $columns ) {
  $slice1 = array_slice($columns, 0, 2, true);
  $slice2 = array_slice($columns, 2, count($columns), true);
  return array_merge($slice1,array('type' => __ ( 'Type' )),array('sub-type' => __ ( 'Sub-Type' )),$slice2);
}


function corporation_custom_column ( $column, $post_id ) {
  switch ( $column ) {
    case 'type':
      echo get_post_meta ( $post_id, 'type', true );
      break;
    case 'sub-type':
      echo get_post_meta ( $post_id, 'sub-type', true );
      break;
  }
}


// add filter options
function corporation_admin_posts_filter_restrict_manage_posts(){
  global $typenow;
  $type = 'corporation';

  if ($typenow == $type){

    // get the full list of departments from the acf fields
    //$field = get_field_object('field_5a5e2ca106a03');
    //print_r($field['choices']);
    // $values = $field['choices'];


    $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
    $guide = '<option value="%s"%s>%s</option>';

    // hardcoded values for now, there is an issue retrieving them again after the first filter
    $values = array(
       'Committee' => 'Committee'
      ,'Member of the Corporation' => 'Member of the Corporation'
      ,'Trustee' => 'Trustee'
      ,'Trustee Emeriti' => 'Trustee Emeriti'
      ,'Honorary Trustee' => 'Honorary Trustee'
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


function corporation_posts_filter( $query ){
  global $pagenow;
  global $typenow;
  $type = 'corporation';
  if ( $typenow == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != ''){
      $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
  }
}

add_filter ( 'manage_corporation_posts_columns', 'add_corporation_acf_columns' );
add_action ( 'manage_corporation_posts_custom_column', 'corporation_custom_column', 10, 2 );

add_action( 'restrict_manage_posts', 'corporation_admin_posts_filter_restrict_manage_posts' );
add_filter( 'parse_query', 'corporation_posts_filter' );

?>
