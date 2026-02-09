<?php
/**
 * Project Text + Three Images Layout
 * Text on left, 3 images on right with different sizes
 */

// Get ACF fields
$text = get_sub_field('text');
$image_top_right = get_sub_field('image_top-right');
$image_bottom_left = get_sub_field('image_bottom-left');
$image_bottom_right = get_sub_field('image_bottom-right');
?>

<section class="project-text-three-images">
  <div class="project-text-three-images__grid">
    
    <!-- Text Content -->
    <div class="project-text-three-images__text">
      <?php if ($text) : ?>
        <h3><?php echo esc_html($text); ?></h3>
      <?php endif; ?>
    </div>

    <!-- Top Right Image -->
    <?php if ($image_top_right) : ?>
      <div class="project-text-three-images__image project-text-three-images__image--top-right">
        <picture>
          <?php echo wp_get_attachment_image($image_top_right['ID'], 'medium', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <!-- Bottom Left Image -->
    <?php if ($image_bottom_left) : ?>
      <div class="project-text-three-images__image project-text-three-images__image--bottom-left">
        <picture>
          <?php echo wp_get_attachment_image($image_bottom_left['ID'], 'medium', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <!-- Bottom Right Image -->
    <?php if ($image_bottom_right) : ?>
      <div class="project-text-three-images__image project-text-three-images__image--bottom-right">
        <picture>
          <?php echo wp_get_attachment_image($image_bottom_right['ID'], 'medium', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

  </div>
</section>
