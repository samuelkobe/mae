<?php if ( get_sub_field( 'content_with_form' ) == 1 ) : ?>
<section class="container mx-auto px-6 lg:px-0 my-4 xl:my-16">
    <div class="flex flex-col items-start lg:items-center w-full lg:w-5/6 lg:mx-1/12 2xl:w-2/3 2xl:mx-1/6 lg:mt-0 pt-4 lg:pt-16 border-t-2 border-grey-light object-reveal-long">
        <h2 class="font-title font-bold text-2xl lg:text-4xl text-brand-main mb-2 lg:mb-4"><?php echo get_sub_field( 'form_title' ); ?></h2>
        <p class="text-base lg:text-lg lg:leading-relaxed"><?php echo get_sub_field( 'form_content' ); ?></p>
<?php else : ?>
<section class="container mx-auto px-6 lg:px-0">
    <div class="flex flex-col items-start lg:items-center w-full lg:w-5/6 lg:mx-1/12 2xl:w-2/3 2xl:mx-1/6 lg:mt-0 object-reveal-long">
<?php endif; ?>

        <div class="w-full my-4 lg:mt-8">
            <?php echo get_sub_field( 'form_embed' ); ?>
        </div>
        
    </div>

</section>