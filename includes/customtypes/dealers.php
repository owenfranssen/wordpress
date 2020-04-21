<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Custom post type
function dealers_init() {
    $args = array(
      'labels' => array(
          'name' => __('Dealers'),
          'singular_name' => __('Dealer'),
          'add_new' => __('Add New Dealer'),
          'add_new_item' => __('Add a New Dealer'),
          'all_items' => __('All Dealers'),
          'edit_item' => __('Edit Dealer'),
          'view_item' => __('View Dealers'),
          'search_items' => __('Search Dealers'),
          'featured_image' => __('Dealer Logo'),
          'set_featured_image' => __('Set Dealer Logo'),
          'remove_featured_image' => __('Remove Dealer Logo')
        ),
      'description' => "Dealers supplied by Timeless Distributors",
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'rewrite' => true,
      'query_var' => true,
      'menu_icon' => 'dashicons-store',
      'supports' => array(
          'title',
          'custom-fields',
          'thumbnail',
          'editor')
      );
    register_post_type( 'dealers', $args );
}
add_action( 'init', 'dealers_init' );