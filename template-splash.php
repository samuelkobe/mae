<?php /* Template Name: Splash Page Template */ get_header(); ?>

	<main role="main">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php $background_image = get_field( 'background_image', 'option' ); ?>

			<?php if ( $background_image ) : ?>
				<section class="w-full custom-h-screen bg-25%65% lg:bg-center bg-no-repeat bg-256 lg:bg-cover" style="
				background-color: <?php the_field( 'background_color', 'option' ); ?>;
				background-image: url('<?php echo esc_url( $background_image['url'] ); ?>');">
			<?php else: ?>
				<section class="w-full h-auto" style="
				background-color: <?php echo the_field( 'background_color', 'option' ); ?>;">
			<?php endif; ?>

				<div class="flex flex-col w-full custom-h-screen items-center justify-center text-brand-dark">
					<div class="flex flex-row w-full px-4 lg:px-0 items-center justify-center">
						<?php $branding_logo = get_field( 'branding_logo', 'option' ); ?>
						<?php if ( $branding_logo ) : ?>
							<img class="w-full lg:w-1/2" src="<?php echo esc_url( $branding_logo['url'] ); ?>" alt="<?php echo esc_attr( $branding_logo['alt'] ); ?>" />
						<?php endif; ?>
					</div>
					<div class="flex flex-col w-full items-center justify-center px-4 lg:px-0 lg:w-1/2 lg:mx-auto my-0 lg:mt-12">
						<h1 class="text-2xl lg:text-5xl font-sans my-4 text-center text-brand-light"><?php the_field( 'large_text', 'option' ); ?></h1>
						<h2 class="text-base lg:text-xl font-sans text-center text-white" ><?php the_field( 'small_text', 'option' ); ?></h2>
					</div>
				</div>

			</section>

		<?php endwhile; ?>

		<?php else: ?>

			<h2><?php _e( 'Sorry, nothing to display.', 'web-ok-starter' ); ?></h2>

		<?php endif; ?>

	</main>
