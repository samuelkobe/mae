<?php
    $alignment = get_sub_field( 'alignment_option' );
    if ($alignment == 'center') : 
        $left_margin = '0';
        $right_margin = '0';
        $text_alignment = 'center';
    elseif ($alignment == 'end') :
        $left_margin = 'lg:w-1/6';
        $right_margin = 'lg:w-1/12';
        $text_alignment = 'right';
    elseif ($alignment == 'start') :
        $left_margin = 'lg:w-1/12';
        $right_margin = 'lg:w-1/6';
        $text_alignment = 'left';
    endif;
?>

<section class="flex contained items-center justify-center object-reveal-short">
    
    <div class="w-full pt-8 flex flex-col lg:flex-row items-center justify-center relative">

        <div class="hidden w-0 lg:flex <?php echo $left_margin ;?>"></div>

        <div class="flex flex-col w-full lg:w-3/4 md:items-<?php echo $alignment ;?> justify-center relative">
            
			<?php if ( get_sub_field( 'subtitle_toggle' ) == 1 ) : ?>
                <h3 class="text-base lg:text-2xl font-title font-light uppercase text-brand-main mt-4 xl:mt-8 md:text-<?php echo $text_alignment ;?>"><?php the_sub_field( 'subtitle' ); ?></h3>
			<?php else : ?>
			<?php endif; ?>
                <h2 class="text-xl sm:text-2xl xl:text-3xl xl:leading-snug my-2 xl:my-3 font-title font-semibold capitalize text-brand-black md:text-<?php echo $text_alignment ;?>"><?php the_sub_field( 'title' ); ?></h2>
			<?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
                <p class="mt-2 text-base lg:text-xl text-grey-dim font-light md:text-<?php echo $text_alignment ;?>"><?php the_sub_field( 'content' ); ?></p>
			<?php else : ?>
			<?php endif; ?>

			<?php if ( get_sub_field( 'link_toggle' ) == 1 ) : ?>
            <div class="">
                <?php if ( get_sub_field( 'link_or_file' ) == 1 ) : ?>
                    <?php $page_link = get_sub_field( 'page_link' ); ?>
                    <?php if ( $page_link ) : ?>
                        <a class="text-brand-accent text-base lg:text-lg no-underline font-semibold" href="<?php echo esc_url( $page_link['url'] ); ?>" target="<?php echo esc_attr( $page_link['target'] ); ?>"><?php echo esc_html( $page_link['title'] ); ?></a>
                    <?php endif; ?>
                <?php else : ?>
                    <?php $download_file = get_sub_field( 'download_file' ); ?>
                    <?php if ( $download_file ) : ?>
                        <a class="text-brand-accent text-base lg:text-lg no-underline font-semibold" href="<?php echo esc_url( $download_file['url'] ); ?>" title="Download <?php echo esc_html( $download_file['title'] ); ?>" download>Click to download</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
			<?php else : ?>
			<?php endif; ?>

        </div>

        <div class="hidden w-0 lg:flex <?php echo $right_margin ;?>"></div>

    </div>
</section>
