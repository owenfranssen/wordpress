<?php
/**
* Dealers List Template
*/
 ?> 
 
<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/header'); ?>

<?php get_template_part('template-parts/post-nav-bar'); ?>

    <section class="container my-5">
      <div class="row">
        <div class="col-12">
 
          <?php
          if ( have_posts() ) { ?>
          
            <header class="row archive-header border-bottom">
              <div class="col-12 col-lg-6">
                <h1 class="archive-title"><?php post_type_archive_title('Our '); ?></h1>
              </div>

              <div class="col-12 col-md-6">
                <form action="#" class="search-box"> 
                  <div class="input-group">
                    <input id="search" class="form-control" required type="search" tabindex="1" name="email" placeholder="Search for a dealer by name or city" />
                    <a href="#" class="btn btn-secondary input-group-append border-left my-0">Search</a>
                  </div>
                  <input type="hidden" name="link">
                </form>
              </div>
              
              <?php
              if ( category_description() ) : ?>
                <div class="col-12">
                  <p class="archive-meta"><?=category_description(); ?></p>
                </div>
              <?php endif; ?>
            </header>
            
            <?php
            while ( have_posts() ) {
              the_post();
              $city = get_post_meta( $post->ID, 'city', true );
              $county = get_post_meta( $post->ID, 'county', true );
              $telephone = get_post_meta( $post->ID, 'telephone', true );
              ?>
              <article class="row py-5 border-bottom">                
                <div class="col-12 col-md-6">
                  <p>
                    <a href="<?php the_permalink() ?>">
                      <strong><?php the_title(); ?></strong>
                      <br>
                      <?php printf('%s, Co. %s <i class="fas fa-phone text-secondary"></i> %s', $city, $county, $telephone); ?>
                    </a>
                  </p>
                </div>
              </article>
            <?php } /* endwhile */ ?>

            <div class="col-12 mt-5">
              <h3 class="mb-5 text-center">Map With Dealer Locations Pinned</h3>
              <img src="http://placehold.it/800x500" alt="Map" class="img-responsive w-100">
            </div>

            <?php
          } ELSE { ?>
            <p>Sorry, no dealers matched your criteria.</p>
          <?php } /* endif */ ?>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/subscribe'); ?>
  </section> <!-- /#page -->

  <?php $noend = true; get_template_part('template-parts/footer'); ?>
  <script><?php include 'js/dealer-search.js.php' ?></script>

    <!-- <script src="/js/leaflet.js" defer></script>
  <script src='/js/Control.OSMGeocoder.js' defer></script> -->
  
  <?php
  $gopts = array('http'=>array('header'=>"User-Agent: BnBBooking\r\n"));
  $gcontext = stream_context_create($opts);
  $geoapi = "https://nominatim.openstreetmap.org/search?format=json&limit=1&email=noreply@bnbowners.com&q=". urlencode("{$bnb->bnb_name}, {$bnb->address1}, {$bnb->town}, {$bnb->county}, {$bnb->country}");
  $geostring = file_get_contents($geoapi, FALSE, $gcontext);
  IF(strlen($geostring) < 10) {
    IF($bnb->latitude != '') {
      $geostring = json_encode( array(
        array(
          'lat' => $bnb->latitude,
          'lon' => $bnb->longitude
        )
        ));
    } ELSE {
      $geoquery = urlencode(($bnb->address1 != '' ? "{$bnb->address1}, " : '')."{$bnb->town}, ".($bnb->town != $bnb->county ? "{$bnb->county}, " : '')."{$bnb->country}");
      $geoapi = "https://nominatim.openstreetmap.org/search?format=json&limit=1&email=noreply@bnbowners.com&q={$geoquery}";
      $geostring = file_get_contents($geoapi, FALSE, $gcontext);

      IF(strlen($geostring) < 10) {
        $geoquery = urlencode("{$bnb->town}, ".($bnb->town != $bnb->county ? "{$bnb->county}, " : '')."{$bnb->country}");
        $geoapi = "https://nominatim.openstreetmap.org/search?format=json&limit=1&email=noreply@bnbowners.com&q={$geoquery}";
        $geostring = file_get_contents($geoapi, FALSE, $gcontext);
      }
    }
  }
  ?>
  <script>
  const geolocation = <?=$geostring ?: "{}" ?>;
  </script>

  </body>
  </html>