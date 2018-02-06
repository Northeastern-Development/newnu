<?php
  /**
   * Template Name: Corporation
   */

   $args = array(
 		 "post_type" => "corporation"
    ,"posts_per_page" => 1000
 		,'meta_query' => array(
 			 'relation' => 'AND'
 			,'order_clause' => array('key' => 'type','compare' => 'EXISTS')
 		)
 		,'orderby' => array(
 			 'order_clause' => 'ASC'
 		)
 	);

  $posts = query_posts($args);
  echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" <?php do_action('rss2_ns'); ?>>
  <channel>
    <title><?php bloginfo_rss('name'); ?> - Members of the Corporation Feed</title>
    <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
    <link><?php bloginfo_rss('url') ?></link>
    <description>A feed of Northeastern University System Members of the Corporation, managed and maintained by the Office of External Affairs - marketing@northeastern.edu</description>
    <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
    <language><?php echo get_option('rss_language'); ?></language>
    <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
    <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
    <?php do_action('rss2_head'); ?>
    <?php while(have_posts()) : the_post(); $fields = get_fields(); ?>

      <item>
        <title><?=get_the_title()?></title>
        <type><?=$fields['type']?></type>
        <?php if($fields['type'] === "Committee"){ ?>
          <description><![CDATA[<?=$fields['description']?>]]></description>
        <?php }else{ ?>
          <?php if(isset($fields['sub-type']) && $fields['sub-type'] != ""){ ?>
            <sub-type><?=$fields['sub-type']?></sub-type>
          <?php } ?>
          <?php if(isset($fields['headshot']) && $fields['headshot'] != ""){ ?>
            <headshot><?=$fields['headshot']['url']?></headshot>
          <?php } ?>
          <?php if(isset($fields['alumni']) && $fields['alumni'] != ""){ ?>
            <alumni><?=$fields['alumni']?></alumni>
          <?php } ?>
          <?php if(isset($fields['job_title']) && $fields['job_title'] != ""){ ?>
            <job-title><?=$fields['job_title']?></job-title>
          <?php } ?>
          <?php if(isset($fields['retired']) && $fields['retired'] == "Yes"){ ?>
            <retired><?=$fields['retired']?></retired>
          <?php } ?>
          <?php if(isset($fields['current_employer']) && $fields['current_employer'] != ""){ ?>
            <current-employer><?=$fields['current_employer']?></current-employer>
          <?php } ?>
          <?php if(isset($fields['secondary_details']) && $fields['secondary_details'] != ""){ ?>
            <secondary-details><?=$fields['secondary_details']?></secondary-details>
          <?php } ?>
          <?php if(isset($fields['location']) && $fields['location'] != ""){ ?>
            <location><?=$fields['location']?></location>
          <?php } ?>
        <?php } ?>
        <?php rss_enclosure(); ?>
        <?php do_action('rss2_item'); ?>
      </item>

    <?php endwhile; ?>
  </channel>
</rss>
