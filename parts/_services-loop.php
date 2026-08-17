<?php $args = array(
      'post_type' => 'service',
      // 'orderby' => 'title',
      'order' => 'ASC',
  );

  $loop = new WP_Query($args);
  $current_post_permalink = get_permalink(); ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php if (get_the_permalink() == $current_post_permalink): ?>

      <div class="w-full flex flex-row items-center justify-between">
        <div class="flex items-center justify-center h-16">
          <?php $prev_post = get_previous_post();
          if($prev_post) {
             $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
             echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="leading-normal text-lg lg:text-1.5xl text-secondary-dark lg:text-primary hover:opacity-50 transition-opacity duration-300">Previous<span class="leading-normal text-secondary ml-2 lg:ml-4">'. $prev_title . '</span></a>';
          } ?>
        </div>

        <div class="flex items-center justify-center h-16">
          <?php $next_post = get_next_post();
          if($next_post) {
             $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
             echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="leading-normal text-lg lg:text-1.5xl text-secondary-dark lg:text-primary hover:opacity-50 transition-opacity duration-300">Next<span class="leading-normal text-secondary ml-2 lg:ml-4">'. $next_title . '</span></a>';
          }?>
        </div>
      </div>
    <?php endif; ?>

  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>
