<?php
/**
 * Index is the fall back template file for all other Wordpress theme pages
 */
?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/posst-nav-bar'); ?>

    <section class="container my-5">
      <div class="row">
        <div class="col-12">
          <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
          <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php get_template_part('template-parts/footer'); ?>