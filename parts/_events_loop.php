<?php if ( get_field( 'upcoming_events_toggle' ) == 1 ) : ?>
    <section class="relative flex flex-col object-reveal-short">

        <div class="contained py-6 lg:py-24">
            
            <div class="w-full lg:w-11/12 lg:mr-1/12">
            
                <h2 class="text-lg sm:text-xl xl:text-2xl xl:leading-snug font-title font-bold text-brand-dark text-left mb-4 lg:mb-6">Upcoming <?php the_title() ; ?></h2>

                <div class="w-full">
                    <?php

                    global $post;
                    $post_slug = $post->post_name;
                    $cat_bg_colour = '';

                    $cat = 'sunday-morning-service';
                    
                    if ( $post_slug == 'sunday-morning-service' ) {
                        $cat = 'sunday-morning-service';
                        $cat_bg_colour = 'main';
                    } elseif ($post_slug == 'sunday-evening-service') {
                        $cat = 'sunday-evening-service';
                        $cat_bg_colour = 'dark';
                    } elseif ($post_slug == 'friday-evening-programs') {
                        $cat = 'friday-evening-programs';
                        $cat_bg_colour = 'accent';
                    } elseif ($post_slug == 'workshops') {
                        $cat = 'workshops';
                        $cat_bg_colour = 'neutral';
                    } else {
                        $cat = '';
                        $cat_bg_colour = 'black';
                    }

                    // Find current date time.
                    $date_now = date('Y-m-d H:i:s', strtotime( $d . "-8 hours")); // Vancouver timezone
                    $time_now = strtotime($date_now);
                    
                    $date_now_w_end_date_offset = date('Y-m-d H:i:s', strtotime( $d . " -1 days -8 hours")); // the date is removed 24hrs after it ends

                    $args = array( 
                        'posts_per_page'    => -1,
                        'post_type'         => 'event',
                        'meta_query' => array(
                            array(
                                'key'           => 'end_date',
                                'compare'       => '>=',
                                'value'         => $date_now_w_end_date_offset,
                                'type'          => 'DATETIME',
                            )
                        ),
                        'tax_query'         => array(
                            array(
                                'taxonomy'  => 'category',
                                'field'     => 'slug',
                                'terms'     => $cat,
                            )
                        ),
                        'order'             => 'ASC',
                        'orderby'           => 'meta_value',
                    );

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <div class="w-full flex flex-row bg-white text-brand-black hover:text-brand-black rounded no-underline mb-16 shadow-2xl shadow-brand-main event-hover-effect event-hover-effect-no-opacity">

                            <div class="w-full md:w-1/4 relative z-0 overflow-hidden flex items-center justify-center rounded-tl rounded-bl">
                                <?php
                                    $button = 'button main mt-3 md:mt-6 mb-2';
                                    $button_highlighted = 'button accent mt-3 md:mt-6 mb-2';

                                    $active_event = false;
                                    $past_event = false;

                                    $event_start = strtotime(get_field( 'start_date' )); // take data from user input and make it into a time stamp for the event start
                                    $event_end = strtotime(get_field( 'end_date' ));  // take data from user input and make it into a time stamp for the event end
                                    
                                    $description_full = get_field( 'event_description');
                                    if(!empty($description_full) && strlen($description_full) > 256) {
                                        $ellipsis = "...";
                                        $description = substr($description_full, 0, 256) . $ellipsis;
                                    } else {
                                        $description = get_field( 'event_description');
                                    }                                

                                    if ($time_now > $event_end) {
                                        $past_event = true;
                                    }

                                    if($time_now > $event_start && $time_now < $event_end) {
                                        $active_event = true;
                                    }

                                    $formatted_event_start = date("l-M-d-g:i a", $event_start); // convert the time stamp into a viewable format that can later be chopped up.

                                    $arr_start = explode('-', $formatted_event_start); // explode the new formatted string that is the start date

                                    $displayed_date = $arr_start[0] . ", " . date('F d, Y | g:i a', $event_start); // assembled date with full month name
                                ?>
                                
                                <div class="absolute top-4 right-4 w-20 h-20 p-2 bg-brand-<?php echo $cat_bg_colour;?> text-white font-button uppercase rounded">
                                    <span class="block text-2xl tracking-wide w-full text-center"><?php echo $arr_start[1]; ?></span>
                                    <span class="block text-4xl tracking-wide w-full text-center -mt-1"><?php echo $arr_start[2]; ?></span>
                                </div>

                                <?php $event_image = get_field( 'event_image' ); ?>
                                <?php if ( $event_image ) : ?>
                                    <img class="w-full h-80 object-cover rounded-tl rounded-bl -z-1 duration-500 transition-all transform scale-100" src="<?php echo esc_url( $event_image['url'] ); ?>" alt="<?php echo esc_attr( $event_image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="w-full md:w-3/4">                       
                                <div class="flex flex-col w-full h-full p-4 lg:px-8 lg:py-6">
                                    <p class="font-semibold text-xl lg:text-3xl text-brand-dark mb-1 lg:mb-2"><?php the_title() ; ?></p>                                
                                    <p class="font-semibold text-base lg:text-xl text-brand-main tracking-wider"><?php echo $displayed_date; ?></p>
                                    <p class="text-sm lg:text-base text-brand-accent mb-1 lg:mb-2"><?php the_field( 'location' ); ?></p>
                                    <p class="text-sm lg:text-base text-brand-black"><?php echo $description; ?></p>
                                    <div class="flex flex-row">
                                        <div class="flex flex-row mr-0 lg:mr-4">
                                            <a class="<?php echo $button; ?>" href="<?php the_permalink(); ?>">Learn More</a>
                                        </div>
                                        <?php if($past_event == false) : ?>
                                            <?php if($active_event == false) : ?>
                                                <div class="flex flex-row mr-0 lg:mr-4">
                                                    <a class="<?php echo $button; ?>" href="<?php the_field( 'zoom_registration_link' ); ?>">Register Now</a>
                                                </div>                   
                                            <?php endif; ?>                       
                                        <?php endif; ?>                       
                                        <?php if($active_event == true) : ?>              
                                            <div class="flex flex-row mr-0 lg:mr-4">
                                                <a class="<?php echo $button_highlighted; ?>" href="<?php the_field( 'zoom_registration_link' ); ?>">Join Now</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                    <?php endwhile; endif;

                    wp_reset_query(); ?>

                </div>

            </div>

        </div>

    </section>
<?php else : ?>
    <section class="contained my-8 xl:my-16 object-reveal-short">
        <div class="w-full lg:w-5/6 xl:w-3/4 mx-0 lg:mx-1/12 xl:ml-1/12 xl:mr-1/6">
            <p class="text-brand-neutral">Upcoming events of this nature are not publically posted.</p>
        </div>
    </section>
<?php endif; ?>