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

            <p>Search products in category...</p>

            <p>List brands in this category...</p>
            
            <section class="row">
            <?php
            WHILE ( have_posts() ) {
              the_post(); 
              get_template_part('template-parts/loop-product');
            } ?>
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