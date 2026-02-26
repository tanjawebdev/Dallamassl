<?php
/**
 * Service Section 3 Layout
 * Two-column layout with image and service content
 */

// Get ACF fields
$service_id = get_sub_field('service'); // Taxonomy (returns ID)
$text = get_sub_field('text');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
$moodtext = get_sub_field('moodtext');
$image = get_sub_field('image'); // Image field

// Convert term ID to term object
$service = $service_id ? get_term($service_id) : null;
?>

<section class="service-section-3" id="service-<?php echo esc_attr($service_id); ?>">
  <div class="service-section-3__grid">
    
    <!-- Image (Left) -->
    <?php if ($image) : ?>
      <div class="service-section-3__image">
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy">
      </div>
    <?php endif; ?>

    <!-- Content Column (Right) -->
    <div class="service-section-3__content">
      
      <!-- Service Taxonomy -->
      <?php if ($service && !is_wp_error($service)) : ?>
        <div class="service-section-3__service">
          <h3><?php echo esc_html($service->name); ?></h3>
        </div>
      <?php endif; ?>

      <!-- Text Content -->
      <?php if ($text) : ?>
        <div class="service-section-3__text">
          <?php echo wpautop($text); ?>
        </div>
      <?php endif; ?>

      <!-- Link/CTA -->
      <?php if ($link) : ?>
        <div class="service-section-3__link">
          <a href="<?php echo esc_url($link); ?>" class="btn btn-primary">
            <span class="h4"><?php echo $linktext ? esc_html($linktext) : 'CONTACT US'; ?></span>
          </a>
        </div>
      <?php endif; ?>

      <!-- Moodtext -->
      <?php if ($moodtext) : ?>
        <div class="service-section-3__moodtext">
          <h3><?php echo esc_html($moodtext); ?></h3>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
