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
      while ($projects_query->have_posts()) : $projects_query->the_post(); 
        $project_id = get_the_ID();
        $project_title = get_the_title();
        $project_url = get_permalink();
        
        // Calculate position in the repeating pattern (0-4)
        $position = $index % 5;
        
        // Determine which image to use based on position
        // Positions 0, 1, 3 = portrait | Positions 2, 4 = landscape
        $use_portrait = in_array($position, [0, 1, 3]);
        
        if ($use_portrait) {
          $featured_image_acf = get_field('featured_image_portrait', $project_id);
        } else {
          $featured_image_acf = get_field('featured_image_landscape', $project_id);
        }
        
        $featured_image = $featured_image_acf ? $featured_image_acf['url'] : '';
        
        // Get project type taxonomy
        $project_types = get_the_terms($project_id, 'project_type');
        $project_type_label = ($project_types && !is_wp_error($project_types)) ? esc_html($project_types[0]->name) : '';
      ?>
        <div class="project-overview__teaser project-overview__teaser--pos-<?php echo $position; ?>">
          <a href="<?php echo esc_url($project_url); ?>" class="project-overview__link">
            <?php if ($featured_image) : ?>
              <div class="project-overview__image hover-round">
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($project_title); ?>" loading="lazy">
              </div>
            <?php endif; ?>
            
            <div class="project-overview__meta">
              <span class="project-overview__title description"><?php echo esc_html($project_title); ?></span>
              <?php if ($project_type_label) : ?>
                <span class="project-overview__type description"><?php echo $project_type_label; ?></span>
              <?php endif; ?>
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

  <div class="project-overview__container container-lg">    
    <?php if ($moodtexts) : ?>
      <?php foreach ($moodtexts as $moodtext) : ?>
        <div class="project-overview__moodtext">
          <?php echo wpautop($moodtext['text']); ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>
</section>
