<section class="relative flex flex-col object-reveal-short">

    <div class="contained py-6 lg:py-24">
        
        <div class="w-full lg:w-5/6 lg:mx-1/12 swiper-events overflow-hidden">
        
            <h2 class="text-lg sm:text-xl xl:text-2xl xl:leading-snug font-title font-bold text-brand-black text-left mb-4 lg:mb-6">Upcoming Events</h2>    

            <div class="w-full swiper-wrapper">

                <?php

                // Find current date time.
                $date_now = date('Y-m-d H:i:s', strtotime( $d . " -1 days -8 hours")); // as soon as the event ends it is removed
                $time_now = strtotime($date_now);

                // Find date time in 28 days.
                $time_next_year = strtotime('+365 days', $time_now);
                $date_next_year = date('Y-m-d H:i:s', $time_next_year);

                // Query events.
                $posts = get_posts(array(
                    'posts_per_page' => -1,
                    'post_type'      => 'event',
                    'meta_query'     => array(
                        array(
                            'key'         => 'end_date', // go off start_date
                            'compare'     => 'BETWEEN',
                            'value'       => array( $date_now, $date_next_year ), // with start date only no 24 hr offset
                            'type'        => 'DATETIME'
                        )
                    ),
                    'order'          => 'ASC',
                    'orderby'        => 'meta_value',
                )); 

                if( $posts ) : ?>
                    <?php foreach( $posts as $post ) : ?>

                    <?php 
                    $categories = get_the_category();
                    $cat_bg_colour = '';
                    
                        if ( !empty( $categories ) ) {
                            $cat_slug = esc_html( $categories[0]->slug ); 
                            if ( sizeof($categories) > 1 ) {
                                $cat_bg_colour = 'black';
                            } else {
                                if ( $cat_slug == 'classes' ) {
                                    $cat_bg_colour = 'main';
                                } elseif ($cat_slug == 'events-cat') {
                                    $cat_bg_colour = 'accent';
                                } elseif ($cat_slug == 'workshops') {
                                    $cat_bg_colour = 'neutral';
                                } else {
                                    $cat_bg_colour = 'black';
                                }
                            }
                        } else {
                            $cat_bg_colour = 'black';
                        }
                    ?>
                        
                        <a class="swiper-slide relative w-1/2 lg:w-1/4 h-64 bg-black text-white hover:text-white rounded no-underline z-0 event-hover-effect overflow-hidden flex items-center justify-center" href="<?php the_permalink(); ?>">
                            <?php $event_image = get_field( 'event_image' ); ?>
                            <?php if ( $event_image ) : ?>
                                <img class="absolute left-0 right-0 object-cover w-full h-64 -z-1 opacity-80 duration-300 transition-all transform scale-105 rounded" src="<?php echo esc_url( $event_image['url'] ); ?>" alt="<?php echo esc_attr( $event_image['alt'] ); ?>" />
                            <?php endif; ?>
                            <?php
                   
                                $event_start = strtotime(get_field( 'start_date' )); // take data from user input and make it into a time stamp for the event start
                                $formatted_event_start = date("l-M-d-g:i a", $event_start); // convert the time stamp into a viewable format that can later be chopped up.
                                $arr_start = explode('-', $formatted_event_start);
                       
                            ?>
                            <div class="absolute top-4 right-4 w-20 h-20 p-2 bg-brand-<?php echo $cat_bg_colour; ?> font-button uppercase rounded">
                                <span class="block text-2xl tracking-wide w-full text-center"><?php echo $arr_start[1]; ?></span>
                                <span class="block text-4xl tracking-wide w-full text-center -mt-1"><?php echo $arr_start[2]; ?></span>
                            </div>
                            
                            <div class="flex flex-col justify-end items-start w-full h-full p-4">
                                <p class="font-button text-lg lg:text-xl"><?php the_title() ; ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="mb-8 lg:mb-16">No upcoming classes, please check back soon.</p>
                <?php endif; ?>


                <?php wp_reset_postdata(); ?>


            </div>

            <div class="flex flex-row flex-wrap mt-2">
                <div class="flex w-full sm:w-1/2 lg:w-auto pr-8 mb-2 xl:mb-0 mt-4">
                    <div class="w-4 h-4 mr-2 bg-brand-main rounded-sm"></div>
                    <span class="font-semibold text-base leading-none text-brand-black">Classes</span>
                </div>
                <div class="flex w-full sm:w-1/2 lg:w-auto pr-8 mb-2 xl:mb-0 mt-4">
                    <div class="w-4 h-4 mr-2 bg-brand-accent rounded-sm"></div>
                    <span class="font-semibold text-base leading-none text-brand-black">Events</span>
                </div>
                <div class="flex w-full sm:w-1/2 lg:w-auto pr-8 mb-2 xl:mb-0 mt-4">
                    <div class="w-4 h-4 mr-2 bg-brand-neutral rounded-sm"></div>
                    <span class="font-semibold text-base leading-none text-brand-black">Workshops</span>
                </div>
                <div class="flex w-full sm:w-1/2 lg:w-auto mt-4">
                    <div class="w-4 h-4 mr-2 bg-brand-black rounded-sm"></div>
                    <span class="font-semibold text-base leading-none text-brand-black">Other</span>
                </div>
            </div>

        </div>

    </div>

    <div class="hidden relative lg:absolute lg:flex lg:flex-row lg:justify-between -mt-4 lg:mt-0 xl:mt-4 lg:w-full lg:h-full lg:px-6 swiper-button-custom-arrow">
        <div class="relative lg:ml-4 swiper-button-prev"></div>
        <div class="relative lg:mr-4 swiper-button-next"></div>
    </div>

</section>

<script type="module">
const eventsSwiper = new Swiper('.swiper-events', {
    loop: false,
    autoplay: {
        delay: 7000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        '320': {
            slidesPerView: 1.5,
            spaceBetween: 8,
        },
        '1024': {
            slidesPerView: 3,
            spaceBetween: 8,
            autoplay: false,
        },
        '1280': {
            slidesPerView: 4,
            spaceBetween: 16,
            autoplay: false,
        },
    }
});
</script>

