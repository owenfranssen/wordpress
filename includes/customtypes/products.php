<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function products_init() {
    $args = array(
      'labels' => array(
          'name' => __('Products'),
          'singular_name' => __('Product'),
          'add_new' => __('Add New Product'),
          'add_new_item' => __('Add a New Product'),
          'all_items' => __('All Products'),
          'edit_item' => __('Edit Product'),
          'view_item' => __('View Products'),
          'search_items' => __('Search Products'),
          'featured_image' => __('Main Product Photo'),
          'set_featured_image' => __('Set Main Product Photo'),
          'remove_featured_image' => __('Remove Main Product Photo')
        ),
      'description' => "Products stocked by and available from Timeless Distributors",
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'rewrite' => true,
      'query_var' => true,
      'menu_icon' => 'dashicons-products',
      'supports' => array(
          'editor',
          'thumbnail',
          'custom-fields'),
      'taxonomies' => array(
          'product_category',
          //'post_tag'
        )
      );
    register_post_type( 'products', $args );
}
add_action( 'init', 'products_init' );