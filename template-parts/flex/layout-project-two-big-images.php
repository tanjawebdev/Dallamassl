<?php
/**
 * Project Two Big Images Layout
 * Two images side-by-side with different sizes
 */

// Get ACF fields
$left_image = get_sub_field('left_image');
$right_image = get_sub_field('right_image');
?>

<section class="project-two-big-images">
  <div class="project-two-big-images__grid">
    
    <!-- Left Image -->
    <?php if ($left_image) : ?>
      <div class="project-two-big-images__image project-two-big-images__image--left">
        <picture>
          <?php echo wp_get_attachment_image($left_image['ID'], 'medium', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <!-- Right Image -->
    <?php if ($right_image) : ?>
      <div class="project-two-big-images__image project-two-big-images__image--right">
        <picture>
          <?php echo wp_get_attachment_image($right_image['ID'], 'large', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

  </div>
</section>
