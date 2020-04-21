<?php
/**
 * The Template for displaying products.
 *
 * @package blm_basic
 */
?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

<section class="container my-5">
  <div class="row">
    <div class="col-12">

      <?php IF (have_posts()) {
        WHILE (have_posts()) {
          the_post();
          $thumb_id = get_post_thumbnail_id();
          $pic_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
          $medium_url = $pic_url_array[0]; 
          $pic_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
          $large_url = $pic_url_array[0]; 
          
          $description = get_field('description'); // < includes html autoformatting, e.g. <p> || plain text without wysiwyg auto formatting > //get_post_meta( $post->ID, 'description', true );

          $brand_id = get_post_meta( $post->ID, 'brand');
          $brand_id = $brand_id[0][0];
          $product_category_id = get_the_terms( $post->ID, 'product_category');
          $product_category_id = $product_category_id[0]->term_taxonomy_id;
          ?>
          <div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="col-12 col-md-6 order-md-2">
              <picture>
                <source media="(max-width: 799px)" srcset="<?=$medium_url?>">
                <source media="(min-width: 800px)" srcset="<?=$large_url?>">
                <img src="<?=$large_url ?>" class="card-img-top img-fluid" alt="<?php the_title(); ?>">
              </picture>
            </div>
            <div class="col-12 col-md-6 order-md-1">
              <h1><?php the_title(); ?></h1>
              
              <span><?php echo __(substr($description, 0, ($x = strrpos(substr($description, 0, 600), '</p>')))); ?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <span><?php echo __(substr($description, $x)); ?></span>
            </div>
          </div>
        </div>
        <?php }
      } ?>
	
      </div>
    </div>
  </section>

  <?php
    $next = true;
    $prev = true;
    IF(empty(get_previous_post())) $prev = false;
    IF(empty(get_next_post())) $next = false;
  ?>

  <section class="container-fluid post-navigation bg-light py-4">
    <div class="container">
      <nav class="row">
        <?php IF($prev) { ?>
        <div class="<?=($next ? 'col-6 col-md-3' : 'col-12 col-md-4')?> order-md-1 text-left">
          <?php previous_post_link('<i class="fas fa-arrow-left text-secondary"></i> %link', '%title', $in_same_term = true, $excluded_terms = '', $taxonomy = 'product_category'); ?>
        </div>
        <?php } ?>
        <?php IF($next) { ?>
        <div class="<?=($next ? 'col-6 col-md-3' : 'col-12 col-4')?> order-md-4 text-right">
          <?php next_post_link( '%link <i class="fas fa-arrow-right text-secondary"></i>', '%title', $in_same_term = true, $excluded_terms = '', $taxonomy = 'product_category' ); ?>
        </div>
        <?php } ?>
        <div class="col-12 d-md-none"><hr class="my-3 w-50"></div>
        <div class="col-6 <?=(!$prev || !$next ? 'col-md-4' : 'col-md-3')?> order-md-2 text-center">
          <?php IF(isset($brand_id)) printf('<a href="%s">More %s Products</a>', get_permalink($brand_id), get_the_title($brand_id)); ?>
        </div>
        <div class="col-6 <?=(!$prev || !$next ? 'col-md-4' : 'col-md-3')?> order-md-3 text-center">
          <?php IF(isset($product_category_id)) {
            $term = get_term($product_category_id, 'product_category');
            printf('<a href="%s">More %s</a>', get_term_link($product_category_id), __($term->name)); 
          } ?>
        </div>
      </nav>
    </div>
  </section>

  <?php get_template_part('template-parts/subscribe'); ?>
</section> <!-- /#page -->

<?php get_template_part('template-parts/footer'); ?>