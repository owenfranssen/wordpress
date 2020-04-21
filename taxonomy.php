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
 
          <?php
          IF ( have_posts() ) { ?>
          
            <header class="archive-header">
              <h1 class="archive-title"><?php single_term_title('Our Range of '); ?></h1>
              
              <?php
              if ( category_description() ) : ?>
                <div class="archive-meta"><?=term_description(); ?></div>
              <?php endif; ?>
            </header>

            <p>List brands with products in this category...</p>
            
            <section class="row">
              <?php
              $term_id = get_queried_object()->term_id;

              ///$categories = get_field('product_categories');

              $categories = get_posts([
                'numberposts' => -1,
                'post_type' => 'brands',
                'meta_key' => 'product_categories',
                'meta_value' => $term_id
              ]);

              var_dump($categories);

              // $loop = new WP_Query( array(
              //     'post_type' => 'brands',
              //     'meta_key' => 'product_categories',
              //     'meta_value' => $term_id
              //   )
              // );

              // echo $loop->post_count;

              // IF ( $loop->have_posts() ) {
              //   WHILE ( $loop->have_posts() ) {
              //     the_post();
              //     the_title();
              //   }
              // }
              ?>
            </section>
            <?php
          } ELSE { ?>
            <p>Sorry, no products matched your criteria.</p>
          <?php } ?>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php get_template_part('template-parts/footer'); ?>