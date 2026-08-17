<?php get_header(); ?>

	<main role="main">

		<section class="mt-24 xl:mt-48">
    		<div class="flex contained">
				<div class="flex flex-col items-center justify-center w-full h-80">
					<h1 class="text-2xl sm:text-3xl xl:text-4.5xl xl:leading-snug my-4 xl:my-8 font-title font-semibold uppercase text-brand-dark text-center"><?php _e( 'Page not found', 'web-ok-starter' ); ?></h1>
					<a class="text-brand-accent text-lg lg:text-2xl min-h-full no-underline" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Return home?', 'web-ok-starter' ); ?></a>	
				</div>
			</div>
		</section>

		<script type="module">
			const content_header = document.getElementById("content-wrapper");
			const header_element = document.getElementById("header");
			header_element.classList.add('hold-down');
			content_header.classList.add('pt-32');
		</script>

	</main>


<?php get_footer(); ?>
