<?php get_template_part( 'templates/head' ); ?>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<?php
		do_action( 'get_header' );
		// Use Bootstrap's navbar if enabled in config.php
		if ( current_theme_supports( 'bootstrap-top-navbar' ) ) {
			get_template_part( 'templates/header-top-navbar' );
		} else {
			get_template_part( 'templates/header' );
		}
		?>

		<div class="wrap container-fluid" role="document">
			<div class="content row col-sm-12">
				<main class="main <?php echo roots_main_class(); ?>" role="main">
					<?php include roots_template_path(); ?>
				</main>
				<?php if ( roots_display_sidebar() ) : ?>
					<aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
						<?php include roots_sidebar_path(); ?>
					</aside>
				<?php endif; ?>
			</div>
		</div>

		<?php get_template_part( 'templates/footer' ); ?>

	</div>
</body>
</html>
