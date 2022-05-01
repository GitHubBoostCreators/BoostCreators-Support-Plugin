<?php

/**
 * Change "Thanks for using WordPress" to We/Provide text
 * @return String   The string is displayed at the bottom of the WordPress backend
 */

function add_robots_header()
{
if(get_option('blog_public') && !is_admin()): ?>
  <meta name="robots" content="index,follow">
  <meta name="robots" content="noydir,noodp">
<?php endif;
}

add_action( 'wp_head' , 'add_robots_header' );
?>
