<?php
// Get ACF fields
$image_bottom_left = get_sub_field('image_bottom-left');
$image_bottom_right = get_sub_field('image_bottom-right');
?>

<section class="project-two-big-images-2">
  <div class="project-two-big-images-2__grid">

    <!-- Bottom Left Image -->
    <?php if ($image_bottom_left) : ?>
      <div class="project-two-big-images-2__image project-two-big-images-2__image--bottom-left">
        <picture>
          <?php echo wp_get_attachment_image($image_bottom_left['ID'], 'medium_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <!-- Bottom Right Image -->
    <?php if ($image_bottom_right) : ?>
      <div class="project-two-big-images-2__image project-two-big-images-2__image--bottom-right">
        <picture>
          <?php echo wp_get_attachment_image($image_bottom_right['ID'], 'medium_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

  </div>
</section>
