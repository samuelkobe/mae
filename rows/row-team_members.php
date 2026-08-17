<section class="contained object-reveal-short">

    <div class="w-full xl:w-5/6 xl:mx-1/12 my-4 lg:my-16">
        <h2 class="text-lg sm:text-xl xl:text-2xl xl:leading-snug font-title font-bold text-brand-main text-left mb-4 lg:mb-12"><?php the_sub_field( 'team_title' ); ?></h2>
        <?php if ( have_rows( 'team' ) ) : ?>
            <div class="flex flex-row flex-wrap">
                <?php while ( have_rows( 'team' ) ) : the_row(); ?>
                    <div class="w-1/2 sm:w-1/3 mb-8 last:mb-0 lg:mb-0 lg:w-1/5 pr-4">
                         <div class="max-w-full w-full h-auto lg:w-36 lg:h-36 xl:w-44 xl:h-44 2xl:w-48 2xl:h-48 relative mb-4 lg:mb-8">
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <img class="w-full h-full object-cover rounded" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <div class="absolute left-0 -bottom-1 h-3 w-full lg:rounded-b bg-brand-main z-10 pointer-events-none"></div>
                            <?php endif; ?>
                         </div>   
                        <h3 class="text-lg lg:text-2xl font-title font-bold text-brand-main text-left mb-2"><?php the_sub_field( 'name' ); ?></h3>
                        <p class="text-sm sm:text-base"><?php the_sub_field( 'short_bio' ); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <?php // no rows found ?>
        <?php endif; ?>
    </div>

</section>