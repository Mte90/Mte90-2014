<?php
  while (have_posts()) {
  	the_post();
?>
<article <?php post_class(); ?>>
<header>
  <h1 class="entry-title"><?php echo the_title(); ?></h1>
  <ul class="lang-menu">
    <?php pll_the_languages( array( 'show_flags' => 1 ) ); ?>
  </ul>
  <?php
    get_template_part('templates/entry-meta');
  ?>
</header>
<div class="entry-content"><?php echo the_content(); ?></div>
<div class="entry-license">
  All the stuff released in this website, where the author is Daniele Scasciafratte, is under the GPL 2.0 license except when the resources have their licenses.
</div>
<footer><?php echo wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?></footer>
<?php
  comments_template('/templates/comments.php');
?>
</article>
<?php
  }
  
?>