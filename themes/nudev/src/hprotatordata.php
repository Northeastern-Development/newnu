<?php

  require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

  $args = array(
    "page_id" => 23
  );

  $res = query_posts($args);

  $fields = get_fields($res[0]->ID);

  $stories = $fields['top_story_blocks'];

  $slides = array();

  $i = 1;

  $s = $stories[0];

    if(count($s['block_slide']) > 1){	// we only want to look at the rotators

      $slides[$i] = array();
      $slides[$i][] = count($s['block_slide']);

      foreach($s['block_slide'] as $b){

        $slides[$i][] = array(
          $b['block_slide_image']['url']
          // ,$b['block_slide_link']
          ,$b['block_slide_title']
          ,$b['slide_tag']
          // ,$b['block_slide_description']
          // ,$b['slide_overlay_logo']['url']
          // ,(isset($b['slide_overlay_logo']) && $b['slide_overlay_logo']['url'] != ''?$b['slide_overlay_logo']['url']:'')
          // ,(isset($b['external_link']) && $b['external_link'] == 1?'_blank':'')
        );
      }

      $r++;
      $i++;
    }

  $slides[0] = $r;

  echo json_encode($slides);

?>
