<?php
/**
 * The Template for displaying dealers.
 *
 * @package blm_basic
 */
?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

<?php IF (have_posts()) {
  the_post(); ?>

  <section class="container my-5">
    <div class="row">
      <div class="col-12 col-md-4">
        <?php
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
        $thumb_url = $thumb_url_array[0];
        IF(!strpos($thumb_url, 'default.png')) printf('<img src="%s" class="img-fluid w-75 mb-2" alt="%s">', $thumb_url, get_the_title()); ?>   
        <h1 class="mb-4"><small><?php the_title(); ?></small></h1>

        <?php
        $address['street'] = get_post_meta( $post->ID, 'address');
        $address['city'] = get_post_meta( $post->ID, 'city');
        $address['county'] = get_post_meta( $post->ID, 'county');
        $address['eircode'] = get_post_meta( $post->ID, 'eircode');
        $telephone = get_post_meta( $post->ID, 'telephone');
        ?>

        <div class="alert-light border-top p-4">
          <div class="row">
            <div class="col-4">
              <i class="fas fa-home fa-3x text-secondary"></i>
            </div>
            <div class="col-8">
              <h5>Address</h5>
              <p>
                <?php FOREACH($address AS $line) printf('%s<br>', $line[0]); ?>
                <?php IF($telephone[0] != '') { ?>
                  <i class="fas fa-phone text-secondary"></i> <a href="tel:<?=$telephone[0]?>"><?=$telephone[0]?></a>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-12 col-md-8">
        <?php 
        $content = get_the_content();
        IF(strlen($content) > 0) {
          printf('<p class="lead">%s</p> <hr class="w-50"> <br>', $content);
        };
        ?>

        <h4 class="text-center mb-4">Brands Stocked by <?=the_title()?></h4>
        <div class="row justify-content-md-center">
          <?php
          $brandids = get_post_meta( $post->ID, 'brands');

          $brands = get_posts([
            'include' => $brandids[0],
            'post_type' => 'brands'
          ]);

          IF ( $brands ) {
            FOREACH ( $brands AS $post ) {
              setup_postdata( $post );
              global $columns;
              $columns = 4;
              get_template_part('template-parts/loop-brand');
            }
          }
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="container-fluid map bg-light p-0" id="map"></section>
  <script>
  //const address = "<?=sprintf('%s %s %s %s', $address['street'][0], $address['eircode'][0], $address['city'][0], $address['county'][0])?>";
  const address = "<?=sprintf('%s, %s, County %s', $address['street'][0], $address['city'][0], $address['county'][0])?>";
  </script>
  <?php 
  // $brand_id = get_the_ID();
  // $product_query_args = [
  //   'post_type' => 'products',
  //   'post_status' => 'publish',
  //   'posts_per_page' => 100,
  //   'orderby' => 'meta_value_num',
  //   'order' => 'DESC',
  //   'meta_query' => [
  //     [
  //       'key' => 'brand',
  //       'value' => $brand_id,
  //       'compare' => 'LIKE'
  //     ]
  //   ]
  // ];

  // $product_query = new WP_Query($product_query_args);
  // IF(0 && $product_query->have_posts()) { 
              // WHILE ($product_query->have_posts()) {
              //   $product_query->the_post();     
              
  //   $brand_query_args = [
  //     'post_type' => 'brands',
  //     'post_status' => 'publish',
  //     'posts_per_page' => 100,
  //     'orderby' => 'meta_value_num',
  //     'order' => 'DESC',
  //     'include' => $brandids[0]
  //   ];
  // $brand_query = new WP_Query($product_query_args);

  // var_dump($brand_query);

  // IF($brand_query->have_posts()) {
  //   WHILE ($brand_query->have_posts()) {
  //     $brand_query->the_post();
  //     get_template_part('template-parts/loop-brand');
  //   }
  // }
  ?>

<?php } /* endif brand exist */ ?>


  <?php get_template_part('template-parts/subscribe'); ?>
</section> <!-- /#page -->

<?php get_template_part('template-parts/footer'); ?>