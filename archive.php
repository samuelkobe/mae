<?php get_header(); ?>

	<main role="main">
		<?php get_template_part('parts/_page-hero'); ?>
		<section>

			<h1><?php _e( 'Archives', 'web-ok-starter' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
