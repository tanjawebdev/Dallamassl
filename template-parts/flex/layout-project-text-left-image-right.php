<?php
/**
 * Project Text + Left Image Right Layout (Copied from Three Images)
 */

// Get ACF fields
$text = get_sub_field('text');
$image_top_right = get_sub_field('image_top-right');
?>

<section class="project-text-left-image-right">
  <div class="project-text-left-image-right__grid">
    
    <!-- Text Content -->
    <div class="project-text-left-image-right__text">
      <?php if ($text) : ?>
        <h3><?php echo esc_html($text); ?></h3>
      <?php endif; ?>
    </div>

    <!-- Top Right Image -->
    <?php if ($image_top_right) : ?>
      <div class="project-text-left-image-right__image project-text-left-image-right__image--top-right fade-in">
        <picture>
          <?php echo wp_get_attachment_image($image_top_right['ID'], 'medium_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

  </div>
</section>
