<?php

  register_taxonomy_for_object_type('category', 'Menu Styles'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'Menu Styles');
  register_post_type('menustyles', // Register Custom Post Type
      array(
      'labels' => array(
          'name' => __('Menu Styles', 'nudev'), // Rename these to suit
          'singular_name' => __('Menu Styles', 'nudev'),
          'add_new' => __('Add New', 'nudev'),
          'add_new_item' => __('Add New', 'nudev'),
          'edit' => __('Edit', 'nudev'),
          'edit_item' => __('Edit', 'nudev'),
          'new_item' => __('New Alert', 'nudev'),
          'view' => __('View Alert', 'nudev'),
          'view_item' => __('View Alert', 'nudev'),
          'search_items' => __('Search Menu Styles', 'nudev'),
          'not_found' => __('No Menu Styles found', 'nudev'),
          'not_found_in_trash' => __('No Menu Styles found in Trash', 'nudev')
      ),
      'public' => true,
      'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
      'has_archive' => false,
      'supports' => array(
          'title',
          'editor',
          'excerpt'
      ), // Go to Dashboard Custom nudev post for supports
      'can_export' => false, // Allows export in Tools > Export
  ));

?>
