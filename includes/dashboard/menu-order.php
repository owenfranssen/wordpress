<?php
function custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;
  return array(
   'index.php', // this represents the dashboard link
   'edit.php', // this is the default POST admin menu for news
   'edit.php?post_type=brands', // Brands
   'edit.php?post_type=dealers', // Brands
   'edit.php?post_type=page',  // this is the default page menu
);
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');