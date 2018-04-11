<div class="social">
  <ul>
    <li>
      <a class="pulse-shrink social-facebook" href="https://www.facebook.com/Mte90" target="_blank" data-text="<?php _e("I don't add people that don't know, so write a pm else I will not accept your request!", 'roots') ?>"></a>
    </li>
    <li>
      <a class="pulse-shrink social-twitter" href="https://twitter.com/Mte90Net" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-github" href="https://github.com/Mte90"></a>
    </li>
    <li>
      <a class="pulse-shrink social-linkedin" href="https://www.linkedin.com/in/danielescasciafratte" target="_blank" data-text="<?php _e("I don't add people that don't know, so write a pm else I will not accept your request!", 'roots') ?>"></a>
    </li>
    <li>
      <a class="pulse-shrink social-mozillians" href="https://mozillians.org/u/Mte90/" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-reddit" href="https://www.reddit.com/user/Mte90/" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-instagram" href="https://instagram.com/Mte90"></a>
    </li>
    <li>
      <a class="pulse-shrink social-mastodon" href="https://hostux.social/@Mte90" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-youtube" href="https://www.youtube.com/user/Mte90lp" target="_blank"></a>
    </li>
    <li>
      <a class="pulse-shrink social-feed" href="<?php echo home_url() . '/feed' ?>" target="_blank" data-text="This site is multilanguage (Italian and English) pick your feed:<br><br><b>Italian - https://daniele.tech/it/feed/</b><br><b>English - https://daniele.tech/en/feed/</b>"></a>
    </li>
  </ul>
</div>
<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container-fluid">
    <div class="slogan">
      Daniele "Mte90" Scasciafratte -
      <ul>
        <li>
          <?php _e("The Eternauta Geek", 'roots'); ?>
        </li>
        <li>
          <?php _e("Wordpress Core Contributor", 'roots'); ?>
        </li>
        <li>
          <?php _e("Debian Sid User", 'roots'); ?>
        </li>
        <li>
          <?php _e("Mozilla TechSpeaker", 'roots'); ?>
        </li>
        <li>
          <?php _e("Open Source Multiversal", 'roots'); ?>
        </li>
        <li>
          <?php _e("Serious Comics Collector", 'roots'); ?>
        </li>
        <li>
          <?php _e("Mozilla Reps", 'roots'); ?>
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