<?php
/**
 * Project Details Big Layout
 * Complex grid layout with images, taxonomies, and text
 */

// Get ACF fields
$image_big_top_left = get_sub_field('image_big_top-left');
$image_big_top_right = get_sub_field('image_big_top-right');
$images_small_bottom = get_sub_field('images_small_bottom');
$moodtext_top_right = get_sub_field('moodtext_top-right');
$project_details_text = get_sub_field('project_details_text');

// Get taxonomies
$project_types = get_the_terms(get_the_ID(), 'project_type');
$services = get_the_terms(get_the_ID(), 'service');
$locations = get_the_terms(get_the_ID(), 'location');
?>

<section class="project-details-small">
  <div class="project-details-small__grid">
    
    <!-- Big Top Left Image -->
    <div class="project-details-small__image project-details-small__image--big-top-left">
      <?php if ($image_big_top_left) : ?>
        <picture>
          <?php echo wp_get_attachment_image($image_big_top_left['ID'], 'medium', false, ['loading' => 'lazy']); ?>
        </picture>
      <?php endif; ?>
    </div>

    <!-- Mood Text Top Right -->
    <div class="project-details-small__moodtext">
      <?php if ($moodtext_top_right) : ?>
        <h3><?php echo esc_html($moodtext_top_right); ?></h3>
      <?php endif; ?>
    </div>

    <!-- Big Top Right Image -->
    <div class="project-details-small__image project-details-small__image--big-top-right">
      <?php if ($image_big_top_right) : ?>
        <picture>
          <?php echo wp_get_attachment_image($image_big_top_right['ID'], 'medium', false, ['loading' => 'lazy']); ?>
        </picture>
      <?php endif; ?>
    </div>

    <!-- Project Details Section -->
    <div class="project-details-small__details">
      <h2 class="project-details-small__title">PROJEKT DETAILS</h2>
      
      <div class="project-details-small__meta">
        <div class="project-details-small__meta-item project-details-small__meta-item--title">
          <h4><?php echo esc_html(get_the_title()); ?></h4>
        </div>

        <?php if ($project_types && !is_wp_error($project_types)) : ?>
          <div class="project-details-small__meta-item project-details-small__meta-item--project-types">
            <h4 class="project-details-small__meta-value">
              <?php echo esc_html($project_types[0]->name); ?>
            </h4>
          </div>
        <?php endif; ?>

        <?php if ($services && !is_wp_error($services)) : ?>
          <div class="project-details-small__meta-item project-details-small__meta-item--services">
            <h4 class="project-details-small__meta-value">
              <?php 
              $service_names = array_map(function($term) { return $term->name; }, $services);
              echo esc_html(implode(' / ', $service_names)); 
              ?>
            </h4>
          </div>
        <?php endif; ?>

        <?php if ($locations && !is_wp_error($locations)) : ?>
          <div class="project-details-small__meta-item project-details-small__meta-item--location">
            <h4 class="project-details-small__meta-value">
              <?php echo esc_html($locations[0]->name); ?>
            </h4>
          </div>
        <?php endif; ?>

        <?php if ($project_details_text) : ?>
          <div class="project-details-small__text">
            <?php echo wpautop($project_details_text); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Small Images Bottom -->
    <div class="project-details-small__image project-details-small__image--small-bottom">
      <?php if ($images_small_bottom) : ?>
        <?php foreach ($images_small_bottom as $image) : ?>
          <div class="project-details-small__image--small-bottom__item">
            <picture>
              <?php echo wp_get_attachment_image($image['ID'], 'small', false, ['loading' => 'lazy']); ?>
            </picture>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>