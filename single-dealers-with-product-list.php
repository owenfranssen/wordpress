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
      <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
        <?php
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
        $thumb_url = $thumb_url_array[0];
        IF(!strpos($thumb_url, 'default.png')) printf('<img src="%s" class="img-fluid w-75 mb-2" alt="%s">', $thumb_url, get_the_title()); ?>   
        <h1 class="m-0"><small><?php the_title(); ?></small></h1>

        <?php
        $address['street'] = get_post_meta( $post->ID, 'address');
        $address['city'] = get_post_meta( $post->ID, 'city');
        $address['county'] = get_post_meta( $post->ID, 'county');
        $address['eircode'] = get_post_meta( $post->ID, 'eircode');
        $telephone = get_post_meta( $post->ID, 'telephone');
        ?>

        <div class="alert-light bg-light p-3">
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

        <div class="map">
          mapbox using Eircode / address geolocation
        </div>
      </div>
      
      <div class="col-12 col-md-8">
        <?php the_content(); ?>

        <?php
        $brandids = get_post_meta( $post->ID, 'brands');

        $brands = get_posts([
          'include' => $brandids[0],
          'post_type' => 'brands'
        ]);

        //var_dump($brands);

        WHILE($brands->have_posts()) {
          $brands->the_post();
          get_template_part('template-parts/loop-brand');
        }
        ?>
      </div>
    </div>
  </section>
  

  <?php 
  $brand_id = get_the_ID();
  $product_query_args = [
    'post_type' => 'products',
    'post_status' => 'publish',
    'posts_per_page' => 100,
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_query' => [
      [
        'key' => 'brand',
        'value' => $brand_id,
        'compare' => 'LIKE'
      ]
    ]
  ];

  $product_query = new WP_Query($product_query_args);
  IF(0 && $product_query->have_posts()) { ?>
    <section class="container my-5">
      <div class="row">
        <div class="col-12">
          <h3 class="mb-3 text-center text-medium"><?php the_title(); ?> parts we distribute</h3>
            <div class="row">
            <?php
              WHILE ($product_query->have_posts()) {
                $product_query->the_post();      
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
                ?>
                <div class="col-6 col-md-3">
                  <div class="card border p-2">
                  <a href="<?php the_permalink() ?>"><img src="<?=$thumb_url ?>" class="card-img-top img-fluid" alt="<?php the_title(); ?>"></a>
                    <div class="card-body text-center">
                      <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                      <p class="card-text">
                        <a href="<?php the_permalink() ?>"></a>
                      </p>
                    </div>
                  </div>
                </div>
                <?php
              } ?>
            </div>
        </div>
      </div>
    </section>
    <?php
  } /* end product list */?>

  <section class="container my-5">
    <div class="row">
      <div class="col-12">
        <ul class="breadcrumb mb-0 p-0 bg-transparent">
          <li class="inline-list-item pr-2">
            <?php the_title() ?> Stock the following brands:
          </li>
          <?php 
          $terms = get_the_terms(get_the_ID(), 'product_category'); 
          FOREACH( $terms AS $category ) { 
            IF($category->parent > 0) { ?>
              <li class="breadcrumb-item">
                <a href="<?=get_term_link($category)?>"><?=$category->name?></a>
              </li>
              <?php
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </section>

<?php } /* endif brand exist */ ?>


  <?php get_template_part('template-parts/subscribe'); ?>
</section> <!-- /#page -->

<?php get_template_part('template-parts/footer'); ?>