<?php

  require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

  $args = array(
    "page_id" => 23
  );

  $res = query_posts($args);

  $stories = get_field('field_5a3941ccf742d');

  $slides = array();

  $i = $r = 1;

  $s = $stories[0];

    if(count($s['block_slide']) > 1){	// we only want to look at the rotators

      $slides[$i] = array();
      $slides[$i][] = count($s['block_slide']);

      foreach($s['block_slide'] as $b){

        $slides[$i][] = array(
          $b['block_slide_image']['url']
          ,wp_strip_all_tags($b['block_slide_title'],true)
          ,$b['slide_tag']
          ,$b['block_slide_link']
        );
      }

      $r++;
      $i++;
    }

  $slides[0] = $r;

  echo json_encode($slides);

?>
