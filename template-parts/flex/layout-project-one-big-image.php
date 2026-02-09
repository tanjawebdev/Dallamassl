<?php
/**
 * Project One Big Image Layout
 * Single large image centered in grid
 */

// Get ACF field
$image = get_sub_field('image');
?>

<section class="project-one-big-image">
  <div class="project-one-big-image__grid">
    
    <?php if ($image) : ?>
      <div class="project-one-big-image__image">
        <picture>
          <?php echo wp_get_attachment_image($image['ID'], 'large', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

  </div>
</section>
