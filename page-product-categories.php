<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

    <section class="container my-5">
      <div class="row">
        <div class="col-12">
          
          <header class="archive-header">
            <h1 class="archive-title text-center text-md-left"><?php the_title(); ?></h1>
          </header>

          <div class="entry-content">
            <p><?php the_content(); ?></p>
          </div>
        </div>

        <div class="col-12">
          <div class="row" id="product_categories">
          <?php
            $product_parent_categories = get_categories([
              'hide_empty' => false,
              'orderby' => 'name',
              'parent' => 0,
              'taxonomy' => 'product_category'
            ]);

            FOREACH($product_parent_categories AS $parent) { ?>
              <div class="col category">
                <h4><?=esc_html( $parent->name )?></h4>

                <ul class="pl-0" id="list-<?=$parent->term_id?>">
                  <?php
                  $children = get_categories([
                    'hide_empty' => false,
                    'orderby' => 'name',
                    'child_of' => $parent->term_id,
                    'taxonomy' => 'product_category'
                  ]);

                  FOREACH($children AS $child) {
                    printf( '<li><a href="%1$s">%2$s</a></li>',
                      esc_url( get_category_link( $child->term_id ) ),
                      esc_html( $child->name )
                    );
                  } /* endforeach */
                  ?>
                </ul>
              </div>
              <?php
            } /* endforeach */
          ?> 
          </div> <!-- accordion -->
        </div>
      </div> <!-- /.row -->
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php get_template_part('template-parts/footer'); ?>
