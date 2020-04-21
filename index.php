<?php
/**
 * Index is the fall back template file for all other Wordpress theme pages
 */
?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

    <section class="container my-5">
      <div class="row">
        <div class="col-12">
          <h1 class="my-5 text-secondary"><?php the_title(); ?></h1>
                  
          <div class="entry-content">
            <?php
            while ( have_posts() ) :
              the_post();
              the_content();
            endwhile; ?>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php get_template_part('template-parts/footer'); ?>