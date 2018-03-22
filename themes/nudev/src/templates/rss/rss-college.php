<?php
  /**
   * Template Name: College
   */

  $posts = query_posts('post_type=college');
  echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" <?php do_action('rss2_ns'); ?>>
  <channel>
    <title><?php bloginfo_rss('name'); ?> - College Feed</title>
    <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
    <link><?php bloginfo_rss('url') ?></link>
    <description>A feed of Northeastern University System colleges information, managed and maintained by the Office of External Affairs - marketing@northeastern.edu</description>
    <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
    <language><?php echo get_option('rss_language'); ?></language>
    <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
    <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
    <?php do_action('rss2_head'); ?>
    <?php while(have_posts()) : the_post(); $fields = get_fields(); ?>
      <item>
        <title><?=$fields['college_name']?></title>
        <abbr><?=$fields['college_abbreviation']?></abbr>
        <description><![CDATA[<?=$fields['college_description']?>]]></description>
        <link><?=$fields['college_url']?></link>
        <?php rss_enclosure(); ?>
        <?php do_action('rss2_item'); ?>
      </item>
    <?php endwhile; ?>
  </channel>
</rss>
