<?php
  /**
   * Template Name: Includes
   */

   $args = array(
 		 "post_type" => "globalincludes",
     "name" => $_GET['r']
 	);

 	$posts = query_posts($args);

  while(have_posts()) : the_post(); $fields = get_fields();

    echo trim($fields['content']);

  endwhile;
?>
