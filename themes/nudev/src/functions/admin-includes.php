<?php

  register_taxonomy_for_object_type('category', 'Global Includes'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Global Includes');
  register_post_type('globalincludes', // Register Custom Post Type
    array(
    'labels' => array(
      'name' => __('Global Includes', 'nudev'), // Rename these to suit
      'singular_name' => __('Global Includes', 'nudev'),
      'add_new' => __('Add New', 'nudev'),
      'add_new_item' => __('Add New', 'nudev'),
      'edit' => __('Edit', 'nudev'),
      'edit_item' => __('Edit', 'nudev'),
      'new_item' => __('New Global Include', 'nudev'),
      'view' => __('View Global Include', 'nudev'),
      'view_item' => __('View Global Include', 'nudev'),
      'search_items' => __('Search Global Includes', 'nudev'),
      'not_found' => __('No Global Includes found', 'nudev'),
      'not_found_in_trash' => __('No Global Includes found in Trash', 'nudev')
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

?>
