<?php

/* **********************************************************************
Site Search
********************************************************************** */
// create a custom search for the class notes
// function template_chooser($template)
// {
//   global $wp_query;
//   $post_type = get_query_var('post_type');
//   if( $wp_query->is_search && $post_type == 'classnotes' ){
//     die();
//     return locate_template('template-classnotes.php');  //  redirect to archive-search.php
//   }
//   return $template;
// }
// add_filter('template_include', 'template_chooser');


/**
* [list_searcheable_acf list all the custom fields we want to include in our search query]
* @return [array] [list of custom fields]
*/
// function list_searcheable_acf(){
//   $list_searcheable_acf = array(
//      'title_panel'
//     ,'type'
//     ,'image'
//     ,'caption'
//     ,'photo_credit'
//     ,'primary_title'
//     ,'secondary_title'
//     ,'background_image_caption'
//     ,'background_image_photo_credit'
//     ,'copy'
//     ,'side_note_copy'
//     ,'copy_block'
//     ,'stats_caption'
//     ,'stats_photo_credit'
//     ,'stats'
//     ,'content'
//     ,'quote'
//     ,'rubrick_rubric'
//     // ,'rubric'
//     ,'author_name'
//     ,'short_bio'
//     ,'full_bio'
//     ,'email'
//     ,'first_name'
//     ,'last_name'
//     ,'note'
//     ,'image_caption'
//   );
//   return $list_searcheable_acf;
// }




// function SearchFilter($query){
//   if ($query->is_search) {
//     // echo $_GET['post_type'];
//     if($_GET['post_type'] === "classnotes"){
//       $query->set('post_type', 'classnotes');
//     }else{
//       $query->set('post_type', 'post');
//     }
//   }
//   return $query;
// }
//
// add_filter('pre_get_posts','SearchFilter');



/**
* [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
* @param  [query-part/string]      $where    [the initial "where" part of the search query]
* @param  [object]                 $wp_query []
* @return [query-part/string]      $where    [the "where" part of the search query as we customized]
* see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
* credits to Vincent Zurczak for the base query structure/spliting tags section
*/
// function advanced_custom_search( $where, &$wp_query ) {
//     global $wpdb;
//
//     if ( empty( $where ))
//         return $where;
//
//     // get search expression
//     $terms = $wp_query->query_vars[ 's' ];
//
//     // explode search expression to get search terms
//     $exploded = explode( ' ', $terms );
//     if( $exploded === FALSE || count( $exploded ) == 0 )
//         $exploded = array( 0 => $terms );
//
//     // reset search in order to rebuilt it as we whish
//     $where = '';
//
//     // get searcheable_acf, a list of advanced custom fields you want to search content in
//     $list_searcheable_acf = list_searcheable_acf();
//     foreach( $exploded as $tag ) :
//         $where .= "
//           AND (
//             (wp_posts.post_title LIKE '%$tag%')
//             OR (wp_posts.post_content LIKE '%$tag%')
//             OR EXISTS (
//               SELECT * FROM wp_postmeta
// 	              WHERE post_id = wp_posts.ID
// 	                AND (";
//         foreach ($list_searcheable_acf as $searcheable_acf) :
//           if ($searcheable_acf == $list_searcheable_acf[0]):
//             $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
//           else :
//             $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
//           endif;
//         endforeach;
// 	        $where .= ")
//             )
//             OR EXISTS (
//               SELECT * FROM wp_comments
//               WHERE comment_post_ID = wp_posts.ID
//                 AND comment_content LIKE '%$tag%'
//             )
//             OR EXISTS(
//               SELECT * FROM wp_terms
//               INNER JOIN wp_postmeta
//                 ON wp_postmeta.meta_value = wp_terms.term_id
//               WHERE post_id = wp_posts.ID
//               AND wp_terms.name LIKE '%$tag%'
//             )
//             OR EXISTS (
//               SELECT * FROM wp_terms
//               INNER JOIN wp_term_taxonomy
//                 ON wp_term_taxonomy.term_id = wp_terms.term_id
//               INNER JOIN wp_term_relationships
//                 ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
//               WHERE (
//           		taxonomy = 'post_tag'
//             		OR taxonomy = 'category'
//             		OR taxonomy = 'myCustomTax'
//           		)
//               	AND object_id = wp_posts.ID
//               	AND wp_terms.name LIKE '%$tag%'
//             )
//         )";
//     endforeach;
//     return $where;
// }
//
// add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );

/* ******************************************************************* */

?>
