<?php if ( get_sub_field( 'image_orientation' ) == 1 ) : ?>
    <?php $image_settings = 'order-1'; ?>
    <?php $content_settings = 'order-2'; ?>
    <?php $section_settings = 'mr-0 lg:mr-1/12 pl-0 lg:pl-1/12'; ?>
    <?php $bg_settings = 'right-0'; ?>
<?php else : ?>
    <?php $image_settings = 'order-2'; ?>
    <?php $content_settings = 'order-1'; ?>
    <?php $section_settings = 'ml-0 lg:mr-1/12 pr-0 lg:pr-1/12'; ?>
    <?php $bg_settings = 'left-0'; ?>
<?php endif; ?>

<section class="contained my-8 xl:my-24 object-reveal-short">
    <div class="flex flex-col lg:flex-row items-center w-full lg:w-11/12 py-0 lg:py-1/12 <?php echo $section_settings; ?> bg-white rounded shadow-2xl shadow-brand-main">

            <div class="flex flex-col h-full lg:flex-row">
                <div class="w-full h-full lg:w-1/2 <?php echo $image_settings; ?>">
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

                <div class="w-full lg:w-1/2 p-8 lg:px-16 lg:py-0 <?php echo $content_settings; ?>">
                    <?php if ( have_rows( 'content_settings' ) ) : ?>
                        <?php while ( have_rows( 'content_settings' ) ) : the_row(); ?>
                            <h2 class="text-2xl lg:text-3xl 2xl:text-4xl xl:leading-snug font-title font-bold text-brand-black text-left mb-8 lg:mb-12 2xl:mb-14 relative">
                                <?php the_sub_field( 'title' ); ?>
                                <span class="absolute left-0 -bottom-4 lg:-bottom-7 h-1 lg:h-2 w-12 lg:w-16 rounded bg-brand-<?php echo $colour; ?> z-10 pointer-events-none"></span>
                            </h2>
                            <p class="text-base lg:text-xl"><?php the_sub_field( 'content' ); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
    </div>
</section>