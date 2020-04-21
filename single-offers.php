<?php
/**
 * The Template for displaying offers.
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
	
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h1><?php the_title(); ?></h1>
              
              <?php the_content(); ?>
                    
              <?php get_template_part( 'inc/meta' ); ?>
              
              <nav class="post-navigation">
                <div class="nav-previous"><?php previous_post_link( '&laquo; %link' ); ?></div>
                <div class="nav-next"><?php next_post_link( '%link &raquo;' ); ?></div>
              </nav>
            </article>
          <?php endwhile; endif; ?>
	
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php get_template_part('template-parts/footer'); ?>