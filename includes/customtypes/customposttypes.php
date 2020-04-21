<?php
include __DIR__.'/brands.php';
include __DIR__.'/dealers.php';
//include __DIR__.'/products.php';

add_theme_support( 'post-thumbnails', array( 'brands', 'dealers' ) );

// Save Post Name
add_action('acf/save_post', 'save_brand_post', 20);//, 20); // fires after ACF
function save_brand_post($post_id) {
  $post_type = get_post_type($post_id);
  if (!in_array($post_type, array('brands','products','dealers'))) {
    return;
  }
  $post_title = get_field('name', $post_id);
  $post_name = sanitize_title($post_title);
  $post = array(
    'ID' => $post_id,
    'post_name' => $post_name,
    'post_title' => $post_title
  );
  wp_update_post($post);
}