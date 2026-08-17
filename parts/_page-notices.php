<?php if ( get_field( 'notice_board_toggle' ) == 1 ) : ?>
	<?php $button = 'button main mt-4 md:mt-8 mb-2'; ?>
    <section class="container mx-auto px-6 lg:px-0">

        <div class="flex flex-col lg:flex-row py-6 lg:py-24">

            <div class="w-full lg:w-7/12 lg:pr-1/12 lg:border-r-2 lg:border-brand-black">
                <h3 class="font-title font-bold text-lg lg:text-xl text-brand-black mb-6 lg:mb-12"><?php the_sub_field( 'section_title' ); ?></h3>
                <div class="swiper">
                    <?php if ( have_rows( 'notices' ) ): ?>
                        <div class="swiper-wrapper">
                            <?php while ( have_rows( 'notices' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'notice' ) : ?>
                                    <div class="swiper-slide w-full">
                                        <div class="flex flex-col w-full bg-white text-brand-black">                                        
                                            <h2 class="font-title font-bold text-2xl lg:text-4xl text-brand-black mb-2 lg:mb-4"><?php the_sub_field( 'title' ); ?></h2>
                                            <p class="text-base lg:text-lg lg:leading-relaxed"><?php the_sub_field( 'message' ); ?></p>
                                            <?php $button_link = get_sub_field( 'button_link' ); ?>            
                                            <?php if ( $button_link ) : ?>
                                            <div class="flex flex-row relative">
                                                <a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php // no layouts found ?>
                    <?php endif; ?>
                    <!-- Add Arrows -->
                    <div class="mt-12 lg:mt-20 flex flex-row justify-between swiper-button-custom-arrow w-28">
                        <div class="swiper-button-prev left-0"></div>
                        <div class="swiper-button-next right-0"></div>
                    </div>
                    <div class="absolute w-28 bottom-0 right-0">
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
                
            <div class="w-full mt-16 lg:mt-0 lg:w-5/12 lg:pl-1/12 text-brand-black">
                <?php if ( have_rows( 'highlighted_information' ) ) : ?>
                    <?php while ( have_rows( 'highlighted_information' ) ) : the_row(); ?>
                        <h3 class="font-title font-bold text-lg lg:text-xl text-brand-black mb-2 lg:mb-4">Weekly Events</h3>
                        <?php the_sub_field( 'weekly_events' ); ?>

                        <h3 class="font-title font-bold text-lg lg:text-xl text-brand-black mb-2 lg:mb-4 mt-12">Mailing Address</h3>
                        <?php the_sub_field( 'mailing_address' ); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

    </section>

    <script type="module">
    const heroSwiper = new Swiper('.swiper', {
        slidesPerView: 1,
        simulateTouch: false,
        loop: false,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    </script>
<?php else : ?>
	<?php // echo 'false'; ?>
<?php endif; ?>