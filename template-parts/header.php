<body <?php body_class(); ?> data-spy="scroll" data-target="nav">
  <header>
    <nav class="navbar navbar-expand-lg position-relative w-100">
      <div class="container">
        <a class="navbar-brand text-white" href="/"><img src="<?=get_stylesheet_directory_uri(); ?>/img/timeless-distributors.png"
            class="brand-img img-responsive" alt="Timeless Distributors"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars menu-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php wp_nav_menu( array(
              'menu' => "main-menu",
              'menu_class' => "navbar-nav ml-auto",
              'menu_id' => "main-menu",
              'container' => false,
              'before' => '<i class="fa fa-plus text-secondary d-lg-none"></i> '
            ) ) ?>
        </div>
      </div>
    </nav>
  </header>