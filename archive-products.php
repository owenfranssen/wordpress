<?php
/**
* Product List Template
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
          
            <header class="row archive-header mb-5 border-bottom">
              <div class="col-12 col-lg-6">
                <h1 class="archive-title"><?php post_type_archive_title('All Our '); ?></h1>
              </div>

              <div class="col-12 col-md-6">
                <form action="#" class="form-search"> 
                  <div class="form-label-group input-group">
                    <input id="search" class="form-control" required type="search" tabindex="1" name="email" placeholder=" " />
                    <label for="search">Search for a product by name</label>
                    <a href="#" class="btn btn-secondary input-group-append border-left">Search</a> 
                  </div>
                </form>
              </div>
              
              <?php
              if ( category_description() ) : ?>
                <div class="col-12">
                  <p class="archive-meta"><?=category_description(); ?></p>
                </div>
              <?php endif; ?>
            </header>

            <p>List brands by product category...</p>
            
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