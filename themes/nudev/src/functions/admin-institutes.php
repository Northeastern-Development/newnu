<?php

register_taxonomy_for_object_type('category', 'Institutes'); // Register Taxonomies for Category
register_taxonomy_for_object_type('post_tag', 'Institutes');
register_post_type('institutes', // Register Custom Post Type
    array(
    'labels' => array(
        'name' => __('Institutes', 'nudev'), // Rename these to suit
        'singular_name' => __('Institutes', 'nudev'),
        'add_new' => __('Add New Institute', 'nudev'),
        'add_new_item' => __('Add New Institute', 'nudev'),
        'edit' => __('Edit Institute', 'nudev'),
        'edit_item' => __('Edit Institute', 'nudev'),
        'new_item' => __('New Institute', 'nudev'),
        'view' => __('View Institute', 'nudev'),
        'view_item' => __('View Institute', 'nudev'),
        'search_items' => __('Search Institutes', 'nudev'),
        'not_found' => __('No Institutes found', 'nudev'),
        'not_found_in_trash' => __('No Institutes found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
        'post_tag',
        'category'
    ) // Add Category and Post Tags support
));

?>
