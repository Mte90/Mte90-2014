<header class="banner container">
  <div class="row">
    <div class="col-lg-12">
      <a class="brand" href="<?php echo home_url('/') ?>">
        <?php bloginfo('name'); ?>
      </a>
      <nav class="nav-main">
        <?php
          if (has_nav_menu('primary_navigation')) {
          	wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
          }
        ?>
      </nav>
    </div>
  </div>
</header>