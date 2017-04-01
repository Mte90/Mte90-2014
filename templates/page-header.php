<div class="page-header entry-title">
  <h1><?php echo roots_title(); ?></h1>
</div>
<?php if(is_page()) { echo '<ul class="lang-menu">'; pll_the_languages( array( 'show_flags' => 1 ) ); echo '</ul>'; } ?>