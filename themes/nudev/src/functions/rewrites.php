<?php


  // we need to prevent the canonical redirect for theh homepage?
  function disable_canonical_redirect_for_front_page( $redirect ) {
    if ( is_page() && $front_page = get_option( 'page_on_front' ) ) {
      if ( is_page( $front_page ) )
        $redirect = false;
    }

    return $redirect;
  }
  add_filter( 'redirect_canonical', 'disable_canonical_redirect_for_front_page' );



  // this file will house all custom redirects and query tags that we need to create

  // add custom query tags here
  function myplugin_rewrite_tag() {

    // add_rewrite_tag( '%seantesting%', '([^&]+)' );	// this is for the trustees page

    // add_rewrite_tag( '%hptesting%', '([^&]+)' );	// this is for the trustees page

  	add_rewrite_tag( '%team-filter%', '([^&]+)' );	// this is for the administration page
    add_rewrite_tag( '%board-type%', '([^&]+)' );	// this is for the trustees page

  }
  add_action('init', 'myplugin_rewrite_tag', 10, 0);

  // add custom rewrite rules here
  function custom_rewrite_rule() {

    // add_rewrite_rule('^northeastern-experience/([^/]*)?','index.php?page_id=1052&seantesting=$matches[1]','top');  // testing

    // add_rewrite_rule('^([^/]*)?','index.php?page_id=23&hptesting=$matches[1]','top');  // testing

		add_rewrite_rule('^about/university-administration/([^/]*)?','index.php?page_id=778&team-filter=$matches[1]','top');  // administration
    add_rewrite_rule('^about/board-of-trustees/([^/]*)?','index.php?page_id=781&board-type=$matches[1]','top');  // trustees
  }
  add_action('init', 'custom_rewrite_rule', 10, 0);
?>
