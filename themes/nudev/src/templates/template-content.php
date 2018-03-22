<?php
  /**
   * Template Name: Shared Content
   */

   $args = array(
 		 "post_type" => "globalcontent",
     "name" => $_GET['r']
 	);

 	$posts = query_posts($args);

  while(have_posts()) : the_post(); $fields = get_fields();

    echo trim($fields['content']);

  endwhile;
?>
