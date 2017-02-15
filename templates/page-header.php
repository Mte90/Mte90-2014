<div class="page-header entry-title">
  <h1><?php echo roots_title(); ?></h1>
</div>
<?php if(is_page()) { echo cml_show_flags(array('only_existings' => true, 'queried' => false)); } ?>