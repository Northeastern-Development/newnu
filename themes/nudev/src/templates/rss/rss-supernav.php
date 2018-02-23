<?php
  /**
   * Template Name: Supernav
   */


   $args = array(
 		 "post_type" => "supernav"
 		,'meta_query' => array(
 			 'relation' => 'AND'
 			,array("key"=>"status","value"=>"1","compare"=>"=")
 			,array("key"=>"category","value"=>'Main Category',"compare"=>"=")
 		)
 	);

 	$res = query_posts($args);

  $navConfig = array();
	foreach($res as $r){
		$fields = get_fields($r->ID);
		if($fields['sub-type'] == 'Primary'){
			$navConfig[0][] = $r->post_title;
		}else{
			$navConfig[1][] = $r->post_title;
		}
	}

  echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" <?php do_action('rss2_ns'); ?>>
  <channel>
    <title><?php bloginfo_rss('name'); ?> - Northeastern University Main Menu Feed</title>
    <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
    <link><?php bloginfo_rss('url') ?></link>
    <description>A feed of Northeastern University System main menu - marketing@northeastern.edu</description>
    <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
    <language><?php echo get_option('rss_language'); ?></language>
    <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
    <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
    <?php do_action('rss2_head'); ?>
    <items>

    <?php

    $i = 0;
    $jj = 0;

    foreach($navConfig as $nC){

      foreach($nC as $o){

        $args = array(
           "post_type" => "supernav"
          ,'meta_query' => array(
             'relation' => 'AND'
            ,array("key"=>"status","value"=>"1","compare"=>"=")
            ,array("key"=>"category","value"=>trim($o),"compare"=>"=")
          )
        );

        $res = query_posts($args);

        if(count($res) >= 1){

          echo '<item-'.$i.'><title>'.$o.'</title>';
          foreach($res as $r){

            $fields = get_fields($r->ID);

            $guide = '<item-%s><title>%s</title><link>%s</link><thumbnail>%s</thumbnail></item>';

            echo sprintf(
              $guide
              ,$jj
              ,$r->post_title
              ,(strpos($fields['link_target_url'],'http') === false?'http://www.northeastern.edu':'').$fields['link_target_url']
              ,(isset($fields['thumbnail']) && $fields['thumbnail'] != ''?$fields['thumbnail']['url']:'')
            );
          }
          echo'</item>';

        }
        $jj++;
      }
      $i++;
    }

    ?>

  </items>
</channel>
</rss>
