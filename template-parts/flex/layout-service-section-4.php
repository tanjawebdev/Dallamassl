<?php
/**
 * Service Section 4 Layout
 * Two-column layout with service content and project teaser
 */

// Get ACF fields
$service_id = get_sub_field('service'); // Taxonomy (returns ID)
$text = get_sub_field('text');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
$project_teaser_right = get_sub_field('project_teaser_right'); // Post Object

// Convert term ID to term object
$service = $service_id ? get_term($service_id) : null;
?>

<section class="service-section-4">
  <div class="service-section-4__grid">
    
    <!-- Content Column (Left) -->
    <div class="service-section-4__content">
      
      <!-- Service Taxonomy -->
      <?php if ($service && !is_wp_error($service)) : ?>
        <div class="service-section-4__service">
          <h3><?php echo esc_html($service->name); ?></h3>
        </div>
      <?php endif; ?>

      <!-- Text Content -->
      <?php if ($text) : ?>
        <div class="service-section-4__text">
          <?php echo wpautop($text); ?>
        </div>
      <?php endif; ?>

      <!-- Link/CTA -->
      <?php if ($link) : ?>
        <div class="service-section-4__link">
          <a href="<?php echo esc_url($link); ?>" class="btn btn-primary">
            <span class="h4"><?php echo $linktext ? esc_html($linktext) : 'CONTACT US'; ?></span>
          </a>
        </div>
      <?php endif; ?>

    </div>

    <!-- Right Project Teaser (Portrait) -->
    <?php if ($project_teaser_right) : 
      $right_id = $project_teaser_right->ID;
      $right_title = get_the_title($right_id);
      $right_image = get_the_post_thumbnail_url($right_id, 'medium');
      $right_types = get_the_terms($right_id, 'project_type');
      $right_type_name = ($right_types && !is_wp_error($right_types)) ? $right_types[0]->name : '';
      $right_url = get_permalink($right_id);
    ?>
      <?php if ($right_image) : ?>
        <a href="<?php echo esc_url($right_url); ?>" class="service-section-4__project-teaser">
          <div class="service-section-4__project-image hover-round">
            <img src="<?php echo esc_url($right_image); ?>" alt="<?php echo esc_attr($right_title); ?>" loading="lazy">
          </div>
          <div class="service-section-4__project-meta">
            <span class="service-section-4__project-title description"><?php echo esc_html($right_title); ?></span>
            <?php if ($right_type_name) : ?>
              <span class="service-section-4__project-type description"><?php echo esc_html($right_type_name); ?></span>
            <?php endif; ?>
          </div>
        </a>
      <?php endif; ?>
    <?php endif; ?>

  </div>
</section>
