<?php

  // this file generates an array of background iamges ot be used within the iamnav panel

  require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

  $return = array();  // this is the empty array that we will put data into

  // first figure out if we have a single main background image to be used for all cats
  $args = array(
		 "post_type" => "menustyles"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"menu","value"=>"IAm Menu","compare"=>"=")
		)
	);
	$res = query_posts($args);
	$styles = get_fields($res[0]->ID);

  if($styles['background_image'] == ''){  // we have no master background image, so build the individual ones

    $args = array(
  		 "post_type" => "supernav"
  		,'meta_query' => array(
  			 'relation' => 'AND'
  			,array("key"=>"status","value"=>"1","compare"=>"=")
  			,array("key"=>"category","value"=>'Audience',"compare"=>"=")
  			,array("key"=>"sub-type","value"=>'',"compare"=>"=")
  		)
  	);

    $res = query_posts($args);

    $return = array();

    foreach($res as $r){
      $fields = get_fields($r->ID);
      $return[] = $bgImages[strtolower($r->post_title)] = (isset($fields['background_image']) && $fields['background_image'] != ''?$fields['background_image']['url']:'');
    }
  }

  echo json_encode($return);

?>
