<article <?php post_class(); ?>>
<header>
  <h2 class="entry-title">
    <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
  </h2>
  <?php
    get_template_part('templates/entry-meta');
  ?>
</header>
<div class="entry-summary">
  <?php
    $metadesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
    if (!empty($metadesc)) { echo $metadesc; } 
    else { the_excerpt(); }
  ?>
</div>
</article>