<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

<?php // COUNT TYPES
$loop = new WP_Query( array(
    'post_type' => 'brands'
  )
);
$brands = $loop->post_count;

$loop = new WP_Query( array(
    'post_type' => 'products'
  )
);
$products = $loop->post_count;

$loop = new WP_Query( array(
    'post_type' => 'dealers'
  )
);
$dealers = $loop->post_count;
?>

    <section id="factsfigures" class="container-fluid mb-5 p-0 text-white">
      <div class="row py-5">
        <div class="col-6 col-md-4 col-lg-3 offset-md-2 offset-lg-3 text-center">
          <div class="counter-icon mb-3">
              <span class="fas fa-2x fa-warehouse"></span>
          </div>
          <div class="counter-text">
            <h3 class="font-weight-bold"><a href="./brands/"><?=$brands?></a></h3>
            <span class="font-weight-light"><a href="./brands/">Brands Represented</a></span>
          </div>
        </div>
        <!-- <div class="col-4 text-center">
          <div class="counter-icon mb-3">
            <span class="fas fa-2x fa-cogs"></span>
          </div>
          <div class="counter-text">
            <h3 class="font-weight-bold"><a href="./parts/"><?=$products?></a></h3>
            <span class="font-weight-light"><a href="./parts/">Parts Stocked</a></span>
          </div>
        </div> -->
        <div class="col-6 col-md-4 col-lg-3 text-center">
          <div class="counter-icon mb-3">
            <span class="fas fa-2x fa-store"></span>
          </div>
          <div class="counter-text">
            <h3 class="font-weight-bold"><a href="./dealers/"><?=$dealers?></a></h3>
            <span class="font-weight-light"><a href="./dealers/">Dealers Supplied</a></span>
          </div>
        </div>
      </div> <!-- /.row -->
    </section>

    <section class="container mb-5">
      <div class="row">
        <div class="col-12 mb-4 text-center">
          <h3 class="text-secondary">Our Latest News</h3>
          <hr class="dark mb-3 mb-md-0">
        </div>

        <?php
        $loop = new WP_Query( array(
          'posts_per_page' => 3,
        )); 

        IF ( $loop->have_posts() ) :
          WHILE ( $loop->have_posts() ) :
            $loop->the_post();
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            $thumb_url = $thumb_url_array[0];
            IF(strpos($thumb_url, 'default.png')) $thumb_url = get_stylesheet_directory_uri().'/img/timeless-distributors.png';
            ?>
            <div class="col-12 col-md-4 mb-5 mb-md-0">
              <div class="gallery-item">
                <div class="gallery-thumb mb-2">
                  <img src="<?=$thumb_url ?>" class="img-fluid" alt="<?php the_title(); ?>">
                  <div class="image-overlay"></div>
                </div>
                <div class="gallery-details">
                  <h5><a href="<?=the_permalink()?>"><?php the_title(); ?></a></h5>
                  <a><a href="<?=the_permalink()?>"><?php the_excerpt(); ?></a></p>
                </div>
              </div>
            </div>

          <?php
          ENDWHILE;
          wp_reset_postdata();

        ELSE :
          ?><p><?php __('No News'); ?></p><?php
        ENDIF; ?>
        
      </div> <!-- /.row -->
    </section>

    <section class="brands-block container-fluid bg-light pt-5 pb-md-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="mb-3 text-center text-dark">Some of our most popular brands</h3>
            <hr class="mb-3">
            <div class="row text-center">

              <?php
              $loop = new WP_Query( array(
                  'post_type' => 'brands',
                  'posts_per_page' => 4,
                  'meta_key' => 'feature',
                  'meta_value' => 'Yes'
                )
              );
              $count = 0;

              //echo $loop->post_count;
              
              IF ( $loop->have_posts() ) {
                WHILE ( $loop->have_posts() ) {
                  $loop->the_post();
                  $post_id = get_the_ID();
                  $thumb_id = get_post_thumbnail_id();
                  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                  $thumb_url = $thumb_url_array[0];
                  $name = get_post_meta($post_id, 'brand_name');
                  $name = $name[0];
                  ?>
                  <div class="col-md-3 col-sm-6 col-12 brand-feature mb-5 mb-md-0">
                    <a href="<?=the_permalink(); ?>"><img src="<?=$thumb_url?>" alt="<?=_($name)?>" class="img-fluid"></a>
                  </div>
                  <?php
                  $count++;
                }
                wp_reset_postdata();
              }
              ELSE {
                ?><p><?php __('No News'); ?></p><?php
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php $noend = true; get_template_part('template-parts/footer'); ?>

  <!-- xbuild:js(.) js/site.min.js -->
  <!-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="_src/js/site.js"></script> -->
  <!-- endbuild -->

</body> 
</html>
