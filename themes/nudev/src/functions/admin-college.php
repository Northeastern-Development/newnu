<?php



// function delete_post_type(){
//     unregister_post_type( 'colleges' );
// }
// add_action('init','delete_post_type');



register_taxonomy_for_object_type('category', 'College'); // Register Taxonomies for Category
register_taxonomy_for_object_type('post_tag', 'College');
register_post_type('college', // Register Custom Post Type
    array(
    'labels' => array(
        'name' => __('Colleges', 'nudev'), // Rename these to suit
        'singular_name' => __('Colleges', 'nudev'),
        'add_new' => __('Add New College', 'nudev'),
        'add_new_item' => __('Add New College', 'nudev'),
        'edit' => __('Edit College', 'nudev'),
        'edit_item' => __('Edit College', 'nudev'),
        'new_item' => __('New College', 'nudev'),
        'view' => __('View College', 'nudev'),
        'view_item' => __('View College', 'nudev'),
        'search_items' => __('Search Colleges', 'nudev'),
        'not_found' => __('No Colleges found', 'nudev'),
        'not_found_in_trash' => __('No Colleges found in Trash', 'nudev')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => false,
    'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail'
    ), // Go to Dashboard Custom nudev post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
        // 'post_tag',
        // 'category'
    ) // Add Category and Post Tags support
));

?>
