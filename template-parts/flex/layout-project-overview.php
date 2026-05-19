<?php
/**
 * Project Overview Layout
 * Simple text content section for project pages
 */

// Get ACF fields
$description_1 = get_sub_field('description_1');
$moodtexts = get_sub_field('moodtexts');
?>

<section class="project-overview">

  <?php
  // Save current post context so we can restore it after our custom query
  global $post;
  $saved_post = $post;

  // Query all published projects
  $projects_query = new WP_Query(array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => -1, // Get all projects
    'orderby' => 'date',
    'order' => 'DESC'
  ));
  ?>

  <?php if ($projects_query->have_posts()) : ?>
    <div class="project-overview__grid container-lg">
      <?php 
      $index = 0;
      $moodtext_index = 0; // tracks which moodtext to show next (cycles through the repeater)
      $moodtext_count = $moodtexts ? count($moodtexts) : 0;
      

      while ($projects_query->have_posts()) : $projects_query->the_post(); 
        $project_id = get_the_ID();
        $project_title = get_the_title();
        $project_url = get_permalink();
        
        // Calculate position in the repeating pattern (0-4)
        $position = $index % 5;

        // Insert a moodtext after each complete 5-project cycle (before positions 0, except the very first)
        if (($position === 0 || $position === 4) && $moodtext_count > 0) :
          $current_moodtext = $moodtexts[$moodtext_index % $moodtext_count];
          $moodtext_class = ($moodtext_index % 2 === 0) ? 'description' : 'h3';
      ?>
        <div class="project-overview__moodtext <?php echo $moodtext_class; ?>">
          <?php echo wpautop($current_moodtext['text']); ?>
        </div>
      <?php
          $moodtext_index++;
        endif;
        
        // Desktop: portrait for pos 0,1,3 — landscape for pos 2,4
        // Mobile: portrait for all EXCEPT pos-4 (landscape on mobile too)
        $use_portrait_desktop = in_array($position, [0, 1, 3]);

        if ($use_portrait_desktop) {
          $desktop_image_acf = get_field('featured_image_portrait', $project_id);
        } else {
          $desktop_image_acf = get_field('featured_image_landscape', $project_id);
        }

        // Pos-4: landscape on both desktop and mobile
        // Pos-2: landscape on desktop, portrait on mobile
        if ($position === 4) {
          $mobile_image_acf = get_field('featured_image_landscape', $project_id);
        } else {
          $mobile_image_acf = get_field('featured_image_portrait', $project_id);
        }

        // Fallback chain
        $desktop_image_acf = $desktop_image_acf ?: $mobile_image_acf;
        $mobile_image_acf  = $mobile_image_acf  ?: $desktop_image_acf;

      ?>
        <div class="project-overview__teaser project-overview__teaser--pos-<?php echo $position; ?>">
          <a href="<?php echo esc_url($project_url); ?>" class="project-overview__link">
            <?php if ($desktop_image_acf || $mobile_image_acf) : ?>
              <div class="project-overview__image hover-round">
                <picture>
                  <?php if ($mobile_image_acf && $position === 2) :
                    // pos-2: desktop=landscape, mobile=portrait → inject <source>
                    $mobile_src = wp_get_attachment_image_src($mobile_image_acf['ID'], 'medium_size');
                  ?>
                    <source media="(max-width: 991px)" srcset="<?php echo esc_url($mobile_src[0]); ?>">
                  <?php endif; ?>
                  <?php if ($desktop_image_acf) : ?>
                    <?php echo wp_get_attachment_image($desktop_image_acf['ID'], 'medium_size', false, ['loading' => 'lazy', 'alt' => esc_attr($project_title)]); ?>
                  <?php endif; ?>
                </picture>
              </div>
            <?php endif; ?>

            <div class="project-overview__meta">
              <span class="project-overview__title description"><?php echo esc_html($project_title); ?></span>
            </div>
          </a>
        </div>
      <?php 
        $index++;
      endwhile; 
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  <?php
  // Restore the post context to the Projects page so ACF's flexible content loop continues
  $post = $saved_post;
  setup_postdata($post);
  ?>
</section>
