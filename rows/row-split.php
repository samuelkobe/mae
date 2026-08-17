<section class="container mx-auto px-6 lg:px-0">

    <div class="flex flex-col lg:flex-row py-6 lg:pt-24 lg:pb-16">

        <div class="w-full lg:w-7/12 lg:pr-1/12 lg:border-r-2 lg:border-grey-light">

            <?php if ( have_rows( 'left_grouping' ) ) : ?>
				<?php while ( have_rows( 'left_grouping' ) ) : the_row(); ?>
					<?php if ( get_sub_field( 'content_type_left' ) == 1 ) : ?>
						<h2 class="font-title font-bold text-2xl lg:text-4xl text-brand-dark mb-4 lg:mb-6 object-reveal-long"><?php the_sub_field( 'left_title' ); ?></h2>
					    <p class="font-sans text-brand-black text-base lg:text-lg object-reveal-long"><?php the_sub_field( 'paragraph' ); ?></p>
					<?php else : ?>
						<h2 class="font-title font-bold text-xl lg:text-3xl text-brand-dark mb-4 lg:mb-6 object-reveal-long"><?php the_sub_field( 'left_title' ); ?></h2>
					    <p class="font-sans text-brand-black text-base lg:text-lg object-reveal-long"><?php the_sub_field( 'paragraph' ); ?></p>
                        <?php if ( have_rows( 'list' ) ) : ?>
                            <ul class="mt-4 lg:mt-8 list-content object-reveal-long">
                            <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                                <li><?php the_sub_field( 'list_item' ); ?></li>
                            <?php endwhile; ?>
                            </ul>
                        <?php else : ?>
                            <?php // no rows found ?>
                        <?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>

        </div>
            
        <div class="w-full mt-16 lg:mt-0 lg:w-5/12 lg:pl-1/12 text-brand-black">
			<?php if ( have_rows( 'right_grouping' ) ) : ?>
				<?php while ( have_rows( 'right_grouping' ) ) : the_row(); ?>
					<?php if ( get_sub_field( 'content_type_right' ) == 1 ) : ?>
						<h3 class="font-title font-bold text-lg lg:text-2xl text-brand-dark mb-4 lg:mb-6 object-reveal-long"><?php the_sub_field( 'right_title' ); ?></h3>

                        <?php if ( have_rows( 'buttons' ) ) : ?>
                            <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
                                <?php
                                    $button_colour =  get_sub_field( 'colours' );
                                    $button = 'button mb-4 min-w-1/2 lg:min-w-64';
                                    $button_link = get_sub_field( 'button_link' );
                                ?>            
                                <?php if ( $button_link ) : ?>
                                <div class="flex flex-row relative object-reveal-long">
                                    <a class="<?php echo $button . " " . $button_colour?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // no rows found ?>
                        <?php endif; ?>

					<?php else : ?>
						<h3 class="font-title font-bold text-lg lg:text-2xl text-brand-dark mb-4 lg:mb-6 object-reveal-long"><?php the_sub_field( 'right_title' ); ?></h3>
                        <p class="font-sans text-brand-black text-base lg:text-lg object-reveal-long"><?php the_sub_field( 'single_line_of_content' ); ?></p>
                        <?php if ( have_rows( 'list' ) ) : ?>
                            <ol class="mt-4 lg:mt-8 list-content object-reveal-long">
                            <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                                <li><span><?php the_sub_field( 'list_item' ); ?></span></li>
                            <?php endwhile; ?>
                            </ol>
                        <?php else : ?>
                            <?php // no rows found ?>
                        <?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
            
        </div>
    </div>

</section>

