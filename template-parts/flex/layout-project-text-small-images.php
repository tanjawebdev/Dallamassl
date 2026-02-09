<?php
/**
 * Project Text + Small Images Layout
 * Text on left, small image gallery on right
 */

// Get ACF fields
$text = get_sub_field('text');
$small_images = get_sub_field('small_images');
?>

<section class="project-text-small-images">
  <div class="project-text-small-images__grid">
    
    <!-- Text Content -->
    <div class="project-text-small-images__text">
      <?php if ($text) : ?>
        <h3>
        <?php echo wpautop($text); ?>
        </h3>
      <?php endif; ?>
    </div>

    <!-- Small Images Gallery -->
    <?php if ($small_images) : ?>
      <div class="project-text-small-images__gallery">
        <?php foreach ($small_images as $image) : ?>
          <div class="project-text-small-images__gallery-item">
            <picture>
              <?php echo wp_get_attachment_image($image['ID'], 'small', false, ['loading' => 'lazy']); ?>
            </picture>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
