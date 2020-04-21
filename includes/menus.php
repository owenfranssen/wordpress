<?php
add_action( 'init', function () {
  register_nav_menu('main-menu',__( 'Main Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
});

add_filter( 'nav_menu_css_class', function($classes, $item, $args) {
  if($args->menu == "main-menu") {
    $classes[] = "nav-item";
  } else if ($args->menu == "footer-menu") {
    $classes[] = 'mb-3';
  }
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active';
  }
  return $classes;
}, 10, 3);

add_filter( 'nav_menu_link_attributes', function($atts, $item, $args) {
  if($args->menu == "main-menu") {
    $atts['class'] = "nav-link";
  } 
  return $atts;
}, 100, 3);