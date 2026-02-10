<?php
/**
 * Service Section 2 Layout
 * Complex grid with service taxonomy, project teasers, text, and moodtext
 */

// Get ACF fields
$service_id = get_sub_field('service'); // Taxonomy (returns ID)
$project_type_id = get_sub_field('project_type'); // Taxonomy (returns ID)
$text = get_sub_field('text');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
$project_teaser_left = get_sub_field('project_teaser_left'); // Post Object
$project_teaser_right = get_sub_field('project_teaser_right'); // Post Object
$moodtext = get_sub_field('moodtext');

// Convert term IDs to term objects
$service = $service_id ? get_term($service_id) : null;
$project_type = $project_type_id ? get_term($project_type_id) : null;
?>

<section class="service-section-2">
  <div class="service-section-2__grid">
    
    <!-- Service Taxonomy (Top Left) -->
    <?php if ($service && !is_wp_error($service)) : ?>
      <div class="service-section-2__service">
        <h3><?php echo esc_html($service->name); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Project Type Taxonomy (Top Middle) -->
    <?php if ($project_type && !is_wp_error($project_type)) : ?>
      <div class="service-section-2__project-type-header">
        <h3><?php echo esc_html($project_type->description); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Text Content (Top Middle) -->
    <?php if ($text) : ?>
      <div class="service-section-2__text">
        <?php echo wpautop($text); ?>
      </div>
    <?php endif; ?>

    <!-- Link/CTA (Top Middle) -->
    <?php if ($link) : ?>
      <div class="service-section-2__link">
        <a href="<?php echo esc_url($link); ?>" class="btn btn-primary">
          <span class="h4"><?php echo $linktext ? esc_html($linktext) : 'CONTACT US'; ?></span>
        </a>
      </div>
    <?php endif; ?>

    <!-- Right Project Teaser (Top Right - Portrait) -->
    <?php if ($project_teaser_right) : 
      $right_id = $project_teaser_right->ID;
      $right_title = get_the_title($right_id);
      $right_image = get_the_post_thumbnail_url($right_id, 'medium');
      $right_types = get_the_terms($right_id, 'project_type');
      $right_type_name = ($right_types && !is_wp_error($right_types)) ? $right_types[0]->name : '';
      $right_url = get_permalink($right_id);
    ?>
      <?php if ($right_image) : ?>
        <a href="<?php echo esc_url($right_url); ?>" class="service-section-2__project-teaser service-section-2__project-teaser--right">
          <div class="service-section-2__project-image hover-round">
            <img src="<?php echo esc_url($right_image); ?>" alt="<?php echo esc_attr($right_title); ?>" loading="lazy">
          </div>
          <div class="service-section-2__project-meta">
            <span class="service-section-2__project-title description"><?php echo esc_html($right_title); ?></span>
            <?php if ($right_type_name) : ?>
              <span class="service-section-2__project-type description"><?php echo esc_html($right_type_name); ?></span>
            <?php endif; ?>
          </div>
        </a>
      <?php endif; ?>
    <?php endif; ?>

    <!-- Left Project Teaser (Bottom Left - Landscape) -->
    <?php if ($project_teaser_left) : 
      $left_id = $project_teaser_left->ID;
      $left_title = get_the_title($left_id);
      $left_image = get_the_post_thumbnail_url($left_id, 'medium');
      $left_types = get_the_terms($left_id, 'project_type');
      $left_type_name = ($left_types && !is_wp_error($left_types)) ? $left_types[0]->name : '';
      $left_url = get_permalink($left_id);
    ?>
      <?php if ($left_image) : ?>
        <a href="<?php echo esc_url($left_url); ?>" class="service-section-2__project-teaser service-section-2__project-teaser--left">
          <div class="service-section-2__project-image hover-round">
            <img src="<?php echo esc_url($left_image); ?>" alt="<?php echo esc_attr($left_title); ?>" loading="lazy">
          </div>
          <div class="service-section-2__project-meta">
            <span class="service-section-2__project-title description"><?php echo esc_html($left_title); ?></span>
            <?php if ($left_type_name) : ?>
              <span class="service-section-2__project-type description"><?php echo esc_html($left_type_name); ?></span>
            <?php endif; ?>
          </div>
        </a>
      <?php endif; ?>
    <?php endif; ?>

    <!-- Moodtext (Bottom Middle) -->
    <?php if ($moodtext) : ?>
      <div class="service-section-2__moodtext">
        <h3><?php echo esc_html($moodtext); ?></h3>
      </div>
    <?php endif; ?>

  </div>
</section>
