			<!-- footer -->
			<footer class="footer bg-grey-dark text-white mt-16 lg:mt-32 object-reveal-long" role="contentinfo">


				<div class="contained">

					<div class="w-full flex lg:flex-row flex-wrap border-grey-light border-b-2 py-6 lg:py-14">
						<div class="w-1/2 lg:w-1/6 order-2 lg:order-1 mb-8 lg:mb-0">
							<h3 class="text-lg lg:text-2xl text-brand-main font-bold mb-4 lg:mb-6">Store</h4>
							<div class="w-full flex flex-col">
								<?php footer_nav_one(); ?>
							</div>
						</div>
						<div class="w-1/2 lg:w-1/6 order-3 lg:order-2 mb-8 lg:mb-0">
							<h3 class="text-lg lg:text-2xl text-brand-main font-bold mb-4 lg:mb-6">Info</h4>
							<div class="w-full flex flex-col">
								<?php footer_nav_two(); ?>
							</div>
						</div>
						<div class="w-full flex-col items-start lg:w-1/6 order-4 lg:order-3">
							<h3 class="text-lg lg:text-2xl text-brand-main font-bold mb-4 lg:mb-6">Follow us</h4>
							<?php if ( have_rows( 'social_media', 'option' ) ) : ?>
								<?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>
								<a class="flex flex-row items-center mr-4 mb-4 lg:mx-0 hover:text-brand-neutral transition-colors duration-300" href="<?php the_sub_field( 'url' ); ?>" target="_blank" rel="noreferrer">
									<?php $icon = get_sub_field( 'icon' ); ?>
									<?php if ( $icon ) : ?>
										<img width='24' height='24' class="w-6 object-contain" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
									<?php endif; ?>
									<p class="ml-4"><?php the_sub_field( 'title' ); ?></p>
								</a>
								<?php endwhile; ?>
							<?php else : ?>
								<?php // no rows found ?>
							<?php endif; ?>
						</div>

						<?php if ( get_field( 'newsletter_toggle', 'option' ) == 1 ) : ?>	
							<div class="w-full lg:w-1/3 lg:mx-1/12 order-1 lg:order-4 mb-8 lg:mb-0">
								<h3 class="text-lg lg:text-2xl text-brand-main font-bold mb-4 lg:mb-7">Newsletter</h4>
								<?php the_field( 'newsletter_form_embed', 'option' ); ?>
							</div>
						<?php else : ?>
							<?php // echo 'false'; ?>
						<?php endif; ?>
						
					</div>
					
					<div class="w-full flex flex-col lg:flex-row my-8 lg:my-16">
						<div class="w-full lg:w-5/12 mr-0 lg:mr-1/12 order-2 lg:order-1">
							<p class="text-lg xl:text-2xl mb-1 xl:mb-2">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> All rights reserved.</p>
							<p class="text-base"><a href="https://webok.ca" target="_blank" title="Web Ok Solutions Inc."><?php _e('Powered by', 'web-ok-starter'); ?> Web Ok Solutions Inc.</a></p>
						</div>
						<div class="w-full lg:w-5/12 ml-0 lg:ml-1/12 order-1 lg:order-2 mb-4 lg:mb-0">
							<p class="text-lg xl:text-2xl mb-1 xl:mb-2">Get in touch: <a class="hover:text-brand-neutral transition-colors duration-300" href="tel:<?php the_field( 'phone_number', 'option' ); ?>"><?php the_field( 'phone_number_text', 'option' ); ?></a> | <a class="hover:text-brand-neutral transition-colors duration-300" href="mailto:<?php the_field( 'contact_email', 'option' ); ?>?subject=Inquiry from the <?php bloginfo('name'); ?> website" target="_blank"><?php the_field( 'contact_email', 'option' ); ?></a></p>
							<p class="text-base"><?php the_field( 'company_information', 'option' ); ?></p>
						</div>
						
					</div>

				</div>
                	
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->
		<script type="text/javascript">
			ScrollReveal().reveal('.object-reveal-short', { delay: 150, easing: 'ease-in-out', distance: '3rem', reset: false });
			ScrollReveal().reveal('.object-reveal-long', { delay: 250, easing: 'ease-in-out', distance: '6rem', reset: false });
		</script>
		<?php wp_footer(); ?>

	</body>
</html>
