<?php
function register_taxonomy_product_category()
{
  $labels = [
    'name'              => _x('Product Categories', 'taxonomy general name'),
    'singular_name'     => _x('Product Category', 'taxonomy singular name'),
    'search_items'      => __('Search Product Categories'),
    'all_items'         => __('All Product Categories'),
    'parent_item'       => __('Parent Category'),
    'parent_item_colon' => __('Parent Category:'),
    'edit_item'         => __('Edit Product Category'),
    'update_item'       => __('Update Product Category'),
    'add_new_item'      => __('Add New Product Category'),
    'new_item_name'     => __('New Product Category Name'),
    'menu_name'         => __('Product Categories'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => ['slug' => 'product-type'],
  ];
  register_taxonomy('product_category', ['products','brands'], $args);
}
add_action('init', 'register_taxonomy_product_category');
