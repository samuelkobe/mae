<?php if ( get_sub_field( 'image_orientation' ) == 1 ) : ?>
    <?php
        $image_settings = 'order-1';
        $content_settings = 'order-2 lg:pr-0';
    ?>
    
<?php else : ?>
    <?php
        $image_settings = 'lg:order-3';
        $content_settings = 'order-2 lg:pl-0'; 
    ?>
<?php endif; ?>

<section class="contained my-8 xl:my-16 object-reveal-short">

    <div class="flex flex-col lg:flex-row items-center w-full lg:mr-1/12 lg:w-11/12 lg:p-1/24 bg-white rounded shadow-2xl shadow-brand-main">

            <div class="flex flex-col w-full h-full lg:flex-row">
                <div class="w-full h-full lg:w-1/3 <?php echo $image_settings; ?>">
                    <?php if ( have_rows( 'image_settings' ) ) : ?>
                        <?php while ( have_rows( 'image_settings' ) ) : the_row(); ?>
                            <?php $colour = get_sub_field( 'colours' ); ?>
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <div class="w-full h-full relative">
                                    <img class="w-full h-108 xl:h-128 object-cover rounded" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                    <div class="absolute left-0 -bottom-1 h-3 w-full lg:rounded-b bg-brand-<?php echo $colour; ?> z-10 pointer-events-none"></div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="w-full lg:w-2/3 p-8 lg:px-1/24 lg:py-0 <?php echo $content_settings; ?>">
                    <?php if ( have_rows( 'content_settings' ) ) : ?>
                        <?php while ( have_rows( 'content_settings' ) ) : the_row(); ?>
                            <h2 class="text-2xl lg:text-3xl 2xl:text-4xl xl:leading-snug font-title font-bold text-brand-black text-left mb-2"><?php the_sub_field( 'name' ); ?></h2>
                            <h3 class="text-lg lg:text-2xl font-title font-bold text-brand-black text-left mb-2"><?php the_sub_field( 'title' ); ?></h3>
                            <h4 class="text-base lg:text-lg font-title font-bold text-brand-black text-left mb-2 lg:mb-4"><?php the_sub_field( 'focuses' ); ?></h4>
                            <div class="lg:-bottom-7 h-1 lg:h-2 w-12 lg:w-16 rounded bg-brand-<?php echo $colour; ?> z-10 pointer-events-none mb-4"></div>
                            <p class="text-sm lg:text-lg"><?php the_sub_field( 'content' ); ?></p>
                            <div class="flex flex-row relative">
                                <?php if ( get_sub_field( 'contact_information_toggle' ) == 1 ) : ?>
                                    <?php $button_link = get_sub_field( 'email' ); ?>            
                                    <?php if ( $button_link ) : ?>
                                    <div class="flex flex-row relative">
                                        <a class="button main mt-4 md:mt-6 mb-2" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                    </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
    </div>
</section>