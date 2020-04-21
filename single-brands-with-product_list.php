<?php
/**
 * The Template for displaying brands.
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
        ?>
        <img src="<?=$thumb_url ?>" class="img-fluid w-75 mb-2" alt="<?php the_title(); ?>">   
        <h1 class="m-0"><small><?php the_title(); ?></small></h1>
      </div>
      
      <div class="col-12 col-md-8">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
  
  <?php
  //$cats = get_post_meta( $post->ID, "product_categories", true );
  //var_dump($cats);
  // = array(4) { [0]=> string(1) "6" [1]=> string(2) "14" [2]=> string(2) "15" [3]=> string(2) "16" }

  $product_photos = [];
  FOR($i = 1; $i <=4; $i++) {
    IF(($x = get_post_meta( $post->ID, "product_photo_{$i}", true )) != '') {
      $product_photos[] = $x;
    }
  }
  IF(count($product_photos) > 0) { 
    $col = 12 / count($product_photos);
    $colmd = $col >= 3 ? 4 : $col;
    ?>
    <section class="brands-block container-fluid bg-light py-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="mb-3 text-center text-medium">Some of <?php the_title(); ?>'s most popular products</h3>
            <hr class="medium mb-3">
            <div class="row text-center product-photos">
              <?php FOREACH($product_photos AS $photo_id) { 
                $photo_url_array = wp_get_attachment_image_src($photo_id, 'thumbnail', true);
                $photo_url = $photo_url_array[0];
                $photo_alt = get_post_meta( $photo_id, '_wp_attachment_image_alt', true );
                 
                $photo_url_array = wp_get_attachment_image_src($photo_id, 'large', true);
                $photo_url_large = $photo_url_array[0];

                printf('<div class="col-lg-%1$d col-md-%2$d col-12 mb-3 mb-md-0">', $col, $colmd);
                ?>
                  <a href="<?=$photo_url_large?>" data-fancybox="gallery">
                    <img src="<?=$photo_url?>" alt="<?=$photo_alt?>">
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section> <?php
  } ?>

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
            <?php the_title() ?> Supply:
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

  <section class="container my-5">
    <div class="row">
      <div class="col-12 border-top pt-5">
        <?php
        $brandID = get_the_ID();

        $dealers = get_posts([
          'post_type' => 'dealers'
        ]);  

        IF ( $dealers ) {
          FOREACH ( $dealers AS $post ) {
            setup_postdata( $post );
            $brandids = get_post_meta( $post->ID, 'brands');
            IF(in_array($brandID, $brandids[0])) {
              the_title();
            }
          }
        }
        ?>
      </div>
    </div>
  </section>

<?php } /* endif brand exist */ ?>


  <?php get_template_part('template-parts/subscribe'); ?>
</section> <!-- /#page -->

<?php get_template_part('template-parts/footer'); ?>