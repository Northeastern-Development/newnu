<?php
  /**
   * Template Name: Departments and Programs
   */

  // $posts = query_posts('post_type=programs,"posts_per_page" => -1');

  $args = array(
    "post_type" => "programs"
   ,"posts_per_page" => -1
 );

 $posts = query_posts($args);

  echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" <?php do_action('rss2_ns'); ?>>
  <channel>
    <title><?php bloginfo_rss('name'); ?> - Departments and Programs Feed</title>
    <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
    <link><?php bloginfo_rss('url') ?></link>
    <description>A feed of Northeastern University System departments and programs information, managed and maintained by the Office of External Affairs - marketing@northeastern.edu</description>
    <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
    <language><?php echo get_option('rss_language'); ?></language>
    <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
    <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
    <?php do_action('rss2_head'); ?>
    <?php while(have_posts()) : the_post(); $fields = get_fields(); ?>
      <item>
        <title><?=get_the_title()?></title>
        <description><![CDATA[<?=$fields['description']?>]]></description>
        <link><?=$fields['program_url']?></link>
        <?php rss_enclosure(); ?>
        <?php do_action('rss2_item'); ?>
      </item>
    <?php endwhile; ?>
  </channel>
</rss>
