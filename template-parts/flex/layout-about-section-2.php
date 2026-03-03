<?php
/**
 * About Section 2 Layout
 * Complex grid with images, moodtext, and description text
 */

// Get ACF fields
$moodtext = get_sub_field('moodtext');
$text = get_sub_field('text');
$big_image_left = get_sub_field('big_image_left');
$big_image_right = get_sub_field('big_image_right');
?>

<section class="about-section-2">
  <div class="about-section-2__grid">
    
    <!-- Large Image Left (Portrait 4:5) -->
    <?php if ($big_image_left) : ?>
      <div class="about-section-2__image-left">
        <picture>
          <?php echo wp_get_attachment_image($big_image_left['ID'], 'large_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <!-- Small Description Text (Top Right) -->
    <?php if ($text) : ?>
      <div class="about-section-2__text">
        <?php echo wpautop($text); ?>
      </div>
    <?php endif; ?>

    <!-- Moodtext (Center) -->
    <?php if ($moodtext) : ?>
      <div class="about-section-2__moodtext">
        <h3><?php echo esc_html($moodtext); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Large Image Right (Portrait 4:5) -->
    <?php if ($big_image_right) : ?>
      <div class="about-section-2__image-right">
        <picture>
          <?php echo wp_get_attachment_image($big_image_right['ID'], 'large_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

  </div>
</section>
