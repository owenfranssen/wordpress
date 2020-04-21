<?php
/**
* Brand List Template
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
                <h1 class="archive-title"><?php post_type_archive_title('Our '); ?></h1>
              </div>

              <div class="col-12 col-md-6">
                <form action="#" class="search-box"> 
                  <div class="input-group">
                    <input id="search" class="form-control" required type="search" tabindex="1" name="email" placeholder="Search for a brand by name" />
                    <button class="btn btn-secondary input-group-append border-left">Search</button> 
                  </div>
                  <input type="hidden" name="link">
                </form>
              </div>
              
              <?php
              IF ( category_description() ) { ?>
                <div class="col-12">
                  <p class="archive-meta"><?=category_description(); ?></p>
                </div>
              <?php } ?>
            </header>
            
            <section class="row">
            <?php
            WHILE ( have_posts() ) {
              the_post(); 
              get_template_part('template-parts/loop-brand');
            } ?>
            </section>
            <?php
          } ELSE { ?>
            <p>Sorry, no brands matched your criteria.</p>
          <?php } ?>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php $noend = true; get_template_part('template-parts/footer'); ?>
  <script><?php include 'js/brand-search.js.php' ?></script>

  </body>
  </html>