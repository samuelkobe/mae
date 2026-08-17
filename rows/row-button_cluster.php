<section class="contained my-8 xl:my-16 object-reveal-short">
    <div class="flex flex-col items-center w-full lg:w-5/6 mx-0 lg:mx-1/12">
        <h2 class="text-lg sm:text-3xl xl:text-4xl xl:leading-snug font-title font-bold text-brand-dark text-left mb-4 lg:mb-6"><?php the_sub_field( 'cluster_title' ); ?></h2>
        <p class="font-sans text-brand-black text-base lg:text-lg"><?php the_sub_field( 'cluster_description' ); ?></p>
        
        <div class="w-full lg:w-3/4 xl:w-1/2 flex flex-col lg:flex-row flex-nowrap lg:flex-wrap justify-around mt-8 lg:mt-12 items-center">
            <?php if ( have_rows( 'buttons' ) ) : ?>
                <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
                    <div class="w-1/2">
                        <?php
                            $button_colour =  get_sub_field( 'colours' );
                            $button = 'button min-w-64 lg:min-w-0 w-1/2 lg:w-full mx-2 mb-4';
                            $button_link = get_sub_field( 'button_link' );
                        ?>            
                        <?php if ( $button_link ) : ?>
                        <div class="flex flex-row justify-center relative">
                            <a class="<?php echo $button . " " . $button_colour?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <?php // no rows found ?>
            <?php endif; ?>
        </div>


    </div>
</section>