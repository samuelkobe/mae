<section class="my-8 xl:my-16">
    <div class="flex contained">
        <?php
        $faq_count = 0;
        if ( have_rows( 'faqs' ) ) : ?>
        <div class="flex flex-col w-full md:w-5/6 md:mx-1/12 border-t-2 border-grey-light object-reveal-short">
            <?php while ( have_rows( 'faqs' ) ) : the_row(); ?>             
                <div class="faq-item flex flex-col w-full relative border-b-2 border-grey-light py-6 <?php if ($faq_count == 0) : echo 'open'; else : endif; ?>">
                    <h3 class="w-5/6 sm:w-11/12 text-lg xl:text-2xl font-title font-semibold text-brand-accent my-2 xl:my-4 relative"><?php the_sub_field( 'question' ); ?></h3>
                    <p class="w-11/12 text-grey-dark text-base lg:text-lg font-sans my-"><?php the_sub_field( 'answer' ); ?></p>
                </div>
            <?php $faq_count++;
            endwhile; ?>
        </div>
    <?php else : ?>
        <?php // no rows found ?>
    <?php endif; ?>

    </div>
</section>