<?php
$border_settings = 'lg:pt-20';
if ( get_sub_field( 'border_toggle' ) == 1 ) :
    $border_settings = 'lg:pt-24 border-t-2 border-grey-light';
endif;
?>

<section class="container mx-auto px-6 lg:px-0">

    <div class="flex flex-col items-center w-full lg:w-5/6 lg:mx-1/12 2xl:w-2/3 2xl:mx-1/6 mt-4 lg:mt-0 pt-16 <?php echo $border_settings; ?> object-reveal-long">

        <h2 class="font-title font-bold text-2xl lg:text-4xl text-brand-accent mb-2 lg:mb-4"><?php the_sub_field( 'title' ); ?></h2>
        <p class="text-base lg:text-lg lg:leading-relaxed text-center text-brand-black"><?php the_sub_field( 'content' ); ?></p>
        <?php $button = 'button accent mt-4 md:mt-8 mb-2'; ?>
        <?php $call_to_action_button = get_sub_field( 'call_to_action_button' ); ?>
        <?php if ( $call_to_action_button ) : ?>
            <div class="flex flex-row relative">
                <a class="<?php echo $button; ?>" href="<?php echo esc_url( $call_to_action_button['url'] ); ?>" target="<?php echo esc_attr( $call_to_action_button['target'] ); ?>"><?php echo esc_html( $call_to_action_button['title'] ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>