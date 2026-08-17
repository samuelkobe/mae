<?php if ( get_field( 'stream_toggle', 'option' ) == 1 ) : ?>
    <?php 
        $button = 'button accent mt-4 md:mt-8 mb-2';
    ?>

    <section class="container mx-auto px-6 lg:px-0">

        <div class="flex flex-col lg:flex-row py-6 lg:py-24 border-b-2 border-grey-light">

            <?php if ( have_rows( 'stream_video', 'option' ) ) : ?>                
                <?php while ( have_rows( 'stream_video', 'option' ) ) : the_row(); ?>

                    <?php if ( get_sub_field( 'youtube_toggle' ) == 1 ) : ?>
                        <?php
                            $video = get_sub_field( 'youtube_live_embed_code' );
                        ?>
                        <div class="flex relative w-full lg:w-5/12 mr-1/12">
                            <div class="video-embed">
                                <?php echo $video;?>
                            </div>
                            <div class="absolute left-0 -bottom-05 h-3 w-full bg-brand-main z-10 pointer-events-none"></div>
                        </div>
                        <?php $details_width = 'w-full lg:w-1/2'; ?>
                    <?php else : ?>
                        <?php $details_width = 'w-full'; ?>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

            <div class="<?php echo $details_width; ?>">
                <?php if ( have_rows( 'stream_details', 'option' ) ) : ?>
                    <?php while ( have_rows( 'stream_details', 'option' ) ) : the_row(); ?>
                        <h1 class="text-brand-main font-title font-bold text-lg lg:text-xl mb-2 lg:mb-4 mt-8 lg:mt-0"><?php the_sub_field( 'stream_title' ); ?></h1>
                        <?php the_sub_field( 'stream_content' ); ?>
                        <?php $button_link = get_sub_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                        <div class="flex flex-row relative">
                            <a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                        </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>

    </section>
<?php else : ?>
	<?php // echo 'false'; ?>
<?php endif; ?>
