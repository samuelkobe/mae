<?php if ( have_rows( 'hero' ) ): ?>
	<?php while ( have_rows( 'hero' ) ) : the_row(); ?>

    <?php if ( get_sub_field( 'page_hero' ) == 1 ) : // this checks to see if the page hero is active. If not use some inline JS to account for header menu spacing.?>
        
        <?php
            $background_image = get_sub_field( 'background_image' );
            $background_video = get_sub_field( 'background_video' );
            $button = 'button accent mt-4 md:mt-8 mb-2';
			if ( get_sub_field( 'page_hero_height' ) == 1 ) :
                $hero_height = 'lg:custom-h-screen custom-h-screen-80 min-h-96 lg:min-h-160 xl:min-h-192';
            else :
                $hero_height = 'lg:custom-h-screen custom-h-screen-55 min-h-96 lg:min-h-128 mb-8 lg:mb-12';
			endif;
            if ( have_rows( 'background_blend_colour' ) ) :
                while ( have_rows( 'background_blend_colour' ) ) : the_row(); 
                    $colour = get_sub_field( 'colours' );
                    if ($colour == 'none') {
                        $colour = 'none bg-transparent';
                    }
                endwhile; 
            endif;
            $video = '<video
                            class="absolute top-0 left-0 w-full h-full object-cover mix-blend-luminosity"
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
    
    <section class="flex relative w-full <?php echo $hero_height ?> overflow-hidden bg-brand-<?php echo $colour; ?>">
        <div class="absolute left-0 top-0 h-full w-full bg-black z-10 opacity-50 pointer-events-none"></div>
        <div class="absolute left-0 bottom-0 h-3 w-full bg-brand-<?php echo $colour; ?> z-10 pointer-events-none"></div>
        <?php if ( get_sub_field( 'background_type' ) == 1 ) : ?>
            <?php if ( $background_image ) : ?>
                <img class="absolute top-16 left-0 w-full h-full object-cover lg:mix-blend-luminosity" src="<?php echo esc_url( $background_image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" />
            <?php endif; ?> 
        <?php else : ?>
            <?php echo $video;?>
        <?php endif; ?>

        <div class="w-full py-8 md:py-16 mt-16 lg:mt-0 contained flex-col lg:flex-row items-center justify-start relative z-20 text-white">

            <div class="w-full lg:w-2/3 order-2">
                <?php if ( have_rows( 'content' ) ) : ?>
                    <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                        <h1 class="font-black font-title mb-4 lg:mb-6 text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none lg:leading-tight xl:leading-snug object-reveal-short"><?php the_sub_field( 'hero_title' ); ?></h1>
                        <p class="font-normal lg:leading-normal text-base lg:text-lg xl:text-xl w-full xl:w-3/4 object-reveal-long"><?php the_sub_field( 'hero_content' ); ?></p>
                    <?php endwhile; ?>
                <?php endif; ?>

                <div class="flex flex-row relative">
                    <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                        <?php $button_link = get_sub_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                        <div class="flex flex-row relative object-reveal-long">
                            <a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                        </div>
                        <?php endif; ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>

			<?php if ( get_sub_field( 'icon_toggle' ) == 1 ) : ?>
				<div class="flex flex-row relative w-full lg:w-1/3 mb-2 lg:mb-0 order-1 lg:order-3 object-reveal-short">
                    <?php $hero_icon = get_sub_field( 'hero_icon' ); ?>
                    <?php if ( $hero_icon ) : ?>
                        <img class="w-1/2 mx-auto lg:mx-0 lg:w-full" src="<?php echo esc_url( $hero_icon['url'] ); ?>" alt="<?php echo esc_attr( $hero_icon['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
			<?php else : //nothing ?>
			<?php endif; ?>

        </div>
    </section>


<?php else : ?>

    <section class="mt-4 xl:mt-16 xl:mb-6 object-reveal-short">
        <div class="flex contained">
            <h1 class="text-3xl sm:text-4xl xl:text-5xl xl:leading-snug mb-6 lg:mb-16 font-title font-bold text-brand-accent lg:text-center"><?php the_title(); ?></h1>
        </div>
    </section>
    
    <script type="module">
        const content_header = document.getElementById("content-wrapper");
        const header_element = document.getElementById("header");
        header_element.classList.add('hold-down');
        content_header.classList.add('pt-20');
        content_header.classList.add('lg:pt-32');
    </script>

<?php endif; ?>

	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>