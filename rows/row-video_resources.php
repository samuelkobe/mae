<section class="object-reveal-short">
    <div class="flex contained">
        <h2 class="lg:w-11/12 lg:ml-1/12 mt-4 lg:mt-12 text-2xl sm:text-3xl xl:text-4xl xl:leading-snug font-title font-bold text-brand-black"><?php the_sub_field( 'section_title' ); ?></h2>
    </div>

    <?php if ( have_rows( 'video' ) ) : ?>
    
    <div class="flex contained">
    
        <div class="flex flex-col md:flex-row w-full flex-wrap lg:w-11/12 mb-8 mt-4 lg:my-16">
            <?php while ( have_rows( 'video' ) ) : the_row(); ?>


                <div class="w-full flex flex-row md:w-5/12 md:mr-1/12 lg:mr-0 lg:ml-1/12 mb-12 lg:mb-24">

                    <div class="flex flex-col w-full relative mb-hex lg:mb-hex-md">
                        <h3 class="text-xl xl:text-2xl xl:leading-snug mb-2 xl:mb-4 font-title font-semibold text-brand-main"><?php the_sub_field( 'title' ); ?></h3>
                        <div class="video-embed relative">
                            <?php the_sub_field( 'video_embed' ); ?>
                            <div class="absolute left-0 -bottom-1 h-3 w-full lg:rounded-b bg-brand-main z-10 pointer-events-none"></div>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php else : ?>
        <?php // no rows found ?>
    <?php endif; ?>
</section>
