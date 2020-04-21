<?php
// if ( ! defined( 'ABSPATH' ) ) {
// 	exit; // Exit if accessed directly.
// }

require_once($_SERVER['DOCUMENT_ROOT']."/data/wp-load.php");

$brands = get_posts([
  'post_type' => 'brands'
]);

FOREACH($brands AS $i => $brand) {
  $brands[$i] = array(
      'name' => $brand->name,
      'link' => get_permalink($brand),
      'id' => $brand->ID
    );
}

ECHO json_encode($brands);
wp_reset_postdata();