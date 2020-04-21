<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Creates Brands Custom Post Type
function brands_init() {
    $args = array(
      'labels' => array(
          'name' => __('Brands'),
          'singular_name' => __('Brand'),
          'add_new' => __('Add New Brand'),
          'add_new_item' => __('Add a New Brand'),
          'all_items' => __('All Brands'),
          'edit_item' => __('Edit Brand'),
          'view_item' => __('View Brands'),
          'search_items' => __('Search Products'),
          'featured_image' => __('Brand Logo'),
          'set_featured_image' => __('Set Brand Logo'),
          'remove_featured_image' => __('Remove Brand Logo')
        ),
      'description' => "Brands stocked by and available from Timesless Distributors",
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'rewrite' => true,
      'query_var' => true,
      'menu_icon' => 'dashicons-admin-multisite',
      'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'custom-fields'),
      'taxonomies' => array(
          'product_category'
        )
      );
    register_post_type( 'brands', $args );
}
add_action( 'init', 'brands_init' );
