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

  $fields = get_fields($res->ID);

  $guide = '<div class="content"><div><h3>%s</h3><p>%s</p><p>%s</p></div></div><div class="image"><div style="background:url(%s);"></div></div>';

  $campus = sprintf(
    $guide
    ,trim($res->post_title)
    ,$fields['campus_description']
    ,(isset($fields['campus_url']) && $fields['campus_url'] != '' && strtolower(trim($res->post_title)) != 'boston'?'<a href="'.trim($fields['campus_url']).'" title="Learn more about northeastern in '.strtolower(trim($res->post_title)).' [will open in new window]" aria-label="Learn more about northeastern in '.strtolower(trim($res->post_title)).' [will open in new window]" target="_blank"><span>Learn more about Northeastern in '.trim($res->post_title).'</span></a>':'')
    ,$fields['campus_image']['url']
  );

  unset($args,$res,$fields,$guide,$_POST);

  echo $campus;

?>
