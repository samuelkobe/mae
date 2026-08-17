<section class="relative py-12 lg:py-32 my-8 lg:my-16 object-reveal-long">
    <div class="absolute left-0 top-0 h-full w-full bg-brand-main -z-1 pointer-events-none opacity-10"></div>
    <div class="contained">    
        <h2 class="font-title font-bold text-2xl lg:text-4xl text-center text-brand-dark mb-8 lg:mb-16"><?php the_sub_field( 'services_section_title' ); ?></h2>
        <?php $services = get_sub_field( 'services' ); ?>
        <?php if ( $services ) : ?>
            <div class="w-full xl:w-5/6 xl:mx-1/12 flex flex-col sm:flex-row flex-wrap xl:justify-around">
                <?php foreach ( $services as $post ) :  ?>
                    <?php setup_postdata( $post ); ?>
                    <a class="flex flex-col items-center justify-center w-full sm:w-1/2 lg:w-1/3 cursor-pointer" href="<?php the_permalink(); ?>">
                        <?php if ( have_rows( 'hero' ) ): ?>
                            <?php while ( have_rows( 'hero' ) ) : the_row(); ?>

                            <?php if ( get_sub_field( 'page_hero' ) == 1 ) : // this checks to see if the page hero is active. If not use some inline JS to account for header menu spacing.?>
                                
                                <?php
                                    $background_image = get_sub_field( 'background_image' );
                                    $background_video = get_sub_field( 'background_video' );
                                    $button = 'button accent mt-4 md:mt-8 mb-2';
                                    if ( have_rows( 'background_blend_colour' ) ) :
                                        while ( have_rows( 'background_blend_colour' ) ) : the_row(); 
                                            $colour = get_sub_field( 'colours' );
                                        endwhile; 
                                    endif;
                                    $video = '<video
                                                    class="absolute top-0 left-0 w-full h-full object-cover mix-blend-luminosity rounded"
                                                    preload="metadata"
                                                    muted
                                                    autoplay
                                                    loop
                                                    playsinline
                                                    src="' . $background_video . '"
                                                    type="video/mp4">
                                                    Sorry, your browser doesn\'t support embedded videos.
                                                </video>';
                                ?>
                            
                            <div class="flex relative max-w-full mb-8 lg:mb-16 w-64 h-64 sm:w-72 sm:h-72 md:w-88 md:h-88 lg:w-72 lg:h-72 xl:w-80 xl:h-80 overflow-hidden bg-brand-dark hover:bg-transparent transition-colors duration-300 rounded shadow-2xl services-thumbnail">
                                <div class="flex flex-col items-center justify-center absolute left-0 top-0 w-full h-full text-white no-underline z-20 p-4">
                                    <?php if ( have_rows( 'content' ) ) : ?>
                                        <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                                            <h3 class="text-center font-semibold font-sans text-2xl md:text-3xl xl:text-4xl uppercase transition-all duration-300 delay-75 services-content-title mb-0"><?php the_sub_field( 'hero_title' ); ?></h3>
                                            <p class="text-center md:leading-none xl:leading-none text-xs md:text-sm xl:text-base h-0 opacity-0 transition-all duration-300 delay-75 services-content-paragraph"><?php the_sub_field( 'hero_content' ); ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="absolute left-0 top-0 w-full h-full bg-black z-10 opacity-30 pointer-events-none rounded"></div>
                                <div class="absolute left-0 bottom-0 h-0 w-full bg-brand-<?php echo $colour; ?> z-10 pointer-events-none transition-height duration-300 delay-75 services-thumbnail-colour-bar"></div>
                                <?php if ( get_sub_field( 'background_type' ) == 1 ) : ?>
                                    <?php if ( $background_image ) : ?>
                                        <img class="w-full h-full object-cover mix-blend-luminosity" src="<?php echo esc_url( $background_image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" />
                                    <?php endif; ?> 
                                <?php else : ?>
                                    <?php echo $video;?>
                                <?php endif; ?>
                            </div>


                        <?php else : ?>

                            <p>service image deafult should</p>

                        <?php endif; ?>

                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <div class="w-full flex items-center justify-center">
            <?php $button = 'button main'; ?>
            <?php $button_link = get_sub_field( 'button_link' ); ?>
            <?php if ( $button_link ) : ?>
                <div class="flex flex-row relative">
                    <a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>