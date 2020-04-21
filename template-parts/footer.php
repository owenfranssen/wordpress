<?php IF(!isset($noend)) $noend = false; ?>
<footer class="container-fluid py-5 bg-dark text-white">
    <div class="container"> 
      <div class="row">
        <div class="col-md-3"> 
          <img src="<?=get_stylesheet_directory_uri(); ?>/img/timeless-distributors-darkbg.png" alt="Timeless Distributors logo" class="brand-img"> 
          <p class="mt-3">Irish distributors of motorbike, moped and all-terrain vehicle parts and accessories.</p> 
        </div>
        <div class="col-md-3"> 
          <h4>Address</h4> 
          <p class="mt-3"><i class="fa fa-map-marker text-secondary"></i> Ashford, Wicklow</p> 
          <p><i class="fa fa-phone text-secondary"></i> Phone: 040 440 309 </p> 
          <p><i class="fa fa-envelope text-secondary"></i> <?=hide_email(get_bloginfo('admin_email'))?></p> 
        </div>
        <div class="col-md-3"> 
          <h4 class="mb-3">Pages</h4> 
          <!-- <p class="mt-3"><i class="fa fa-plus text-secondary"></i> <a href="#">About Us</a></p> 
          <p><i class="fa fa-plus text-secondary"></i> <a href="#">Delivery Information</a></p> 
          <p><i class="fa fa-plus text-secondary"></i> <a href="#">Privacy &amp; Policy</a></p> 
          <p><i class="fa fa-plus text-secondary"></i> <a href="#">Terms &amp; Conditions</a></p> 
          <p><i class="fa fa-plus text-secondary"></i> <a href="#">Search Terms</a></p>  -->

          <?php wp_nav_menu( array(
              'menu' => "footer-menu",
              'menu_class' => "menu list-unstyled",
              'menu_id' => "footer-menu",
              'container' => false,
              'before' => '<i class="fa fa-plus text-secondary"></i> '
            ) ) ?>
        </div>
        <div class="col-md-3"> 
          <h4>Popular</h4> 
          <p class="mt-3">Fusce non dui at turpis ornare rhoncus. Dolor suspendisse a consec tetur ex. Donec sollic itudin sem est, ut luctus magna amet bibendum vel. Etiam condimentum sagittis metus nec hendrerit dolor sit.</p> 
        </div>
      </div>                                         
    </div>                              
</footer>

<div class="copyright container-fluid py-2 bg-light text-center small">
  <p class="mb-0">All Contents &copy;2019 - Timeless Distributors - Designed by <a href="https://mediarise.ie" target="_blank">Mediarise</a></p>
</div>

<?php wp_footer(); ?>

<!-- Template: <?php global $template; echo basename($template); ?> -->

<?php IF(!$noend) : ?>
</body> 
</html>
<?php ENDIF; ?>