<?php
/**
* Product Category Template
*/
 ?> 
 
<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

    <section class="container my-5">
      <div class="row">
        <div class="col-12">
          
          <header class="archive-header">
            <h1 class="archive-title"><?php single_term_title('Our '); ?> Brands</h1>
            
            <?php
            if ( category_description() ) : ?>
              <div class="archive-meta"><?=term_description(); ?></div>
            <?php endif; ?>
          </header>
          
          <section class="row">
            <?php
            WHILE ( have_posts() ) {
              the_post();
              $thumb_id = get_post_thumbnail_id();
              $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
              $thumb_url = $thumb_url_array[0];
              ?>
              <div class="col-12 col-md-4 mb-4">
                <div class="card border-0 text-center">
                  <a href="<?php the_permalink() ?>"><img src="<?=$thumb_url ?>" class="img-fluid" alt="<?php the_title(); ?>"></a>
                  <div class="card-body p-0">
                    <h5 class="card-title mt-2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                    <p class="card-text">
                      <a href="<?php the_permalink() ?>"></a>
                    </p>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </section>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php get_template_part('template-parts/footer'); ?>