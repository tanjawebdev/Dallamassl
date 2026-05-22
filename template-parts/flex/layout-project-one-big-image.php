<?php
/**
 * Project One Big Image Layout
 * Single large image centered in grid
 */

// Get ACF field
$image = get_sub_field('image');
$headline = get_sub_field('headline');
$text = get_sub_field('text');
?>

<section class="project-one-big-image">
  <div class="project-one-big-image__grid">
    
    <?php if ($image) : ?>
      <div class="project-one-big-image__image fade-in">
        <picture>
          <?php echo wp_get_attachment_image($image['ID'], 'large_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <?php if ($headline) : ?>
      <h3 class="project-one-big-image__headline"><?php echo $headline; ?></h3>
    <?php endif; ?>

    <?php if ($text) : ?>
      <div class="project-one-big-image__text"><?php echo $text; ?></div>
    <?php endif; ?>

  </div>
</section>
