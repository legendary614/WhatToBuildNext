<?php

/*
  This file has to placed in the root of a wordpress installation. It creates posts and pages.
*/

require_once("wp-load.php");

$new_post = array(
 'post_title' => 'lorem ipsum',
 'post_content' => 'lorem ipsum',
 'post_status' => 'publish',
 'post_author' => 1,
 'post_type' => 'page'
 );

for($i=0; $i<3; $i++) {
  $new_post = array(
   'post_title' => 'Top Page ' . ($i+1),
   'post_content' => 'lorem ipsum',
   'post_status' => 'publish',
   'post_author' => 1,
   'post_type' => 'page'
   );
   $post_id = wp_insert_post($new_post);

   for($j=0; $j<18; $j++ ) {
     $newss_post = array(
      'post_title' => 'Second Level Page ' . ($i+1) . '_'. ($j+1),
      'post_content' => 'lorem ipsum',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_parent' => $post_id,
      'post_type' => 'page'
      );
      wp_insert_post($newss_post);
   }
}
