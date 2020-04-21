<?php
add_action( 'wp_enqueue_scripts',  function() {
  # Theme Stylesheets
  wp_enqueue_style('theme_css', get_template_directory_uri().'/css/site.css', array(), 1.56, 'all');

  # Theme Javascripts
  wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/site.min.js', array('jquery'), 1.02, true);

  IF ( is_post_type_archive('brands') ) {
    wp_enqueue_script('bloodhound', get_template_directory_uri() . '/js/vendor/bloodhound.min.js', array('jquery'), 1.0, true);
    wp_enqueue_script('typeahead', get_template_directory_uri() . '/js/vendor/typeahead.bundle.min.js', array('jquery', 'bloodhound'), 1.0, true);
    wp_enqueue_script('handlebars', get_template_directory_uri() . '/js/vendor/handlebars.min.js', array('jquery', 'typeahead'), 1.0, true);
   //wp_enqueue_script('search_js', get_template_directory_uri() . '/js/brand-search.js.php', array('jquery', 'bloodhound', 'typeahead', 'handlebars'), 0.12, true);
  }

  // IF ( is_post_type_archive('dealers') ) {
  //   wp_enqueue_script('map', get_template_directory_uri() . '/js/map.js', array('jquery'), 1.0, true);
  // }

  IF( is_singular( 'brands' ) ) {
    wp_enqueue_style('fancybox_css', get_template_directory_uri().'/css/jquery.fancybox.css', array(), 1.0, 'all');
    wp_enqueue_script('fancybox_js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), 1.0, true);
  }

  IF( is_post_type_archive('dealers') || is_singular( 'dealers' ) ) {
    wp_enqueue_script('leaflet', get_template_directory_uri() . '/js/venfor/leaflet.js', array(), '1.3.4', true);
    wp_enqueue_script('geocoder', get_template_directory_uri() . '/js/venfor/Control.OSMGeocoder.min.js', array('leaflet'), '1.3.4', true);
    wp_enqueue_script('map', get_template_directory_uri() . '/js/map.js', array('jquery','leaflet','geocoder'), '1.0.1', true);

    //wp_enqueue_script('dealers_js', get_template_directory_uri() . '/js/dealers.js', array('jquery','mapbox_js','mapbox-sdk_js'), '1.06', true);
  }

});

add_action( 'admin_enqueue_scripts', function() {
  # Dashboard Scripts
  wp_enqueue_script('theme_dash_js', get_template_directory_uri() . '/js/dashboard.js', array(), 1.04, true);
});