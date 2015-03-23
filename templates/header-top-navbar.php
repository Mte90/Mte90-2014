<div class="social">
  <ul>
    <li>
      <a class="pulse-shrink social-facebook" href="http://www.facebook.com/Mte90" target="_blank" data-text="<?php _e("I don't add people that don't know, so put up else I will not accept your request!", 'roots') ?>"></a>
    </li>
    <li>
      <a class="pulse-shrink social-twitter" href="http://twitter.com/Mte90Net" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-google" href="https://plus.google.com/u/0/+DanieleScasciafratteMte90Net/" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-github" href="https://github.com/Mte90"></a>
    </li>
    <li>
      <a class="pulse-shrink social-linkedin" href="http://it.linkedin.com/pub/daniele-scasciafratte/49/b97/33/" target="_blank" data-text="<?php _e("I don't add people that don't know, so put up else I will not accept your request!", 'roots') ?>"></a>
    </li>
    <li>
      <a class="pulse-shrink social-youtube" href="http://www.youtube.com/user/Mte90lp" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-foursquare" href="http://it.foursquare.com/mte90net" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-mozillians" href="https://mozillians.org/u/Mte90/" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-feed" href="<?php echo home_url() . '/feed' ?>" target="_blank" data-text="This site is multilanguage (Italian and English) pick your feed:<br><br><b>Italian - http://mte90.net/feed/</b><br><b>English - http://mte90.net/en/feed/</b>"></a>
    </li>
  </ul>
</div>
<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container-fluid">
    <a href="<?php echo get_site_url(); ?>">
      <div class="avatar"></div>
    </a>
    <div class="slogan">
      Daniele "Mte90" Scasciafratte - 
      <ul>
        <li>
          <?php _e("The Eternauta Geek", 'roots'); ?>
        </li>
        <li>
          <?php _e("Wordpress Coder", 'roots'); ?>
        </li>
        <li>
          <?php _e("Debian Sid User", 'roots'); ?>
        </li>
        <li>
          <?php _e("Open Source Evangelist", 'roots'); ?>
        </li>
        <li>
          <?php _e("Serious Comics Collector", 'roots'); ?>
        </li>
        <li>
          <?php _e("Mozilla Contributor", 'roots'); ?>
        </li>
        <li>
          <?php _e("KDE/Qt Addicted", 'roots'); ?>
        </li>
      </ul>
    </div>
    <nav class="menu" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) {
        	wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'walker' => new Roots_Nav_Walker()));
        }
      ?>
    </nav>
  </div>
</header>