<?php

  // this loop will show a campus on the experience page

  if(isset($_POST['campus'])){  // if this is a remote request from JS

    require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');  // if remote JS call, we need to prime wordpress

    $args = array(
      "post_type" => "campuses"
      ,"posts_per_page" => 1
      ,"s" => $_POST['campus']
    );
  }else{  // if this is the full request from the experience page
    $args = array(
       "post_type" => "campuses"
       ,"posts_per_page" => 1
       ,'meta_query' => array(
         'relation' => 'AND'
         ,'type_clause' => array("key"=>"show_details","value"=>"1","compare"=>"=")
        )
    );
  }
  $res = query_posts($args)[0];


  // now we need to find the next and previous campuses for the quick jump on mobile
  $args = array(
    "post_type" => "campuses"
    ,"posts_per_page" => -1
    ,'meta_query' => array(
      'relation' => 'AND'
      ,'type_clause' => array("key"=>"show_details","value"=>"1","compare"=>"=")
     )
  );
  $otherCampuses = query_posts($args);

  $nextCampus = $prevCampus = null;
  $i = 0;
  foreach($otherCampuses as $oC){ // loop through and find a match to the campus we are currently looking at
    if($oC->ID == $res->ID){
      if($i > 0){
        $prevCampus = $otherCampuses[$i - 1]; // this is the previous campus as long as we are NOT at the start of the data array
      }else{
        $prevCampus = $otherCampuses[count($otherCampuses) - 1];  // this is the previous campus if we ARE at the start of the data array, jump to end
      }

      if($i == count($otherCampuses) - 1){  // we are at the end of the list of campuses, need to pull the first one
        $nextCampus = $otherCampuses[0];
      }else{  // this is not at the end of the array of campuses
        $nextCampus = $otherCampuses[$i + 1]; // get the next campus
      }
    }
    $i++;
  }

  $fields = get_fields($res->ID);

  $guide = '<div class="content"><div><h3>%1$s</h3><p>%2$s</p>%3$s</div></div><div class="image"><div><div class="image1" style="background:url(%4$s);" aria-label="first image for %1$s"></div><div class="image2" style="background:url(%5$s);" aria-label="second image for %1$s"></div><div class="image3" style="background:url(%6$s);" aria-label="third image for %1$s"></div></div></div><div class="campusnextprev"><ul><li><a class="js__loadcampus prev" href="javascript(void);" title="Jump to %7$s" aria-label="Jump to %7$s" data-campus="%7$s"><span>&#xe5c4</span>%7$s</a></li><li><a class="js__loadcampus next" href="javascript(void);" title="Jump to %8$s" aria-label="Jump to %7$s" data-campus="%8$s">%8$s <span>&#xe5c8</span></a></li></ul></div>';

  $campus = sprintf(
    $guide
    ,trim($res->post_title)
    ,$fields['campus_description']
    ,(isset($fields['campus_url']) && $fields['campus_url'] != '' && strtolower(trim($res->post_title)) != 'boston'?'<p><a href="'.trim($fields['campus_url']).'" title="Learn more about northeastern in '.strtolower(trim($res->post_title)).' [will open in new window]" aria-label="Learn more about northeastern in '.strtolower(trim($res->post_title)).' [will open in new window]" target="_blank"><span>Learn more about Northeastern in '.trim($res->post_title).'</span></a></p>':'')
    ,$fields['campus_image']['url']
    ,(!empty($fields['campus_image_2']['url'])?$fields['campus_image_2']['url']:$fields['campus_image']['url'])
    ,(!empty($fields['campus_image_3']['url'])?$fields['campus_image_3']['url']:$fields['campus_image']['url'])
    ,trim($prevCampus->post_title)
    ,trim($nextCampus->post_title)
  );

  unset($args,$res,$fields,$guide,$_POST,$otherCampuses,$nextCampus,$prevCampus);

  echo $campus;

?>
