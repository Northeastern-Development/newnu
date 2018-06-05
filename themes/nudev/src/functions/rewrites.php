<?php
  // this file will house all custom redirects and query tags that we need to create

  // add custom query tags here
  function myplugin_rewrite_tag() {
  	add_rewrite_tag( '%team-filter%', '([^&]+)' );	// this is for the administration page
    add_rewrite_tag( '%board-type%', '([^&]+)' );	// this is for the trustees page
  }
  add_action('init', 'myplugin_rewrite_tag', 10, 0);

  // add custom rewrite rules here
  function custom_rewrite_rule() {
  		add_rewrite_rule('^about/university-administration/([^/]*)?','index.php?page_id=778&team-filter=$matches[1]','top');  // administration
      add_rewrite_rule('^about/board-of-trustees/([^/]*)?','index.php?page_id=781&board-type=$matches[1]','top');  // trustees
  }
  add_action('init', 'custom_rewrite_rule', 10, 0);
?>
