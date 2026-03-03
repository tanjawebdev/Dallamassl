<?php
/**
 * About Section 1 Layout
 * Two-column layout with headline, small image and large image
 */

// Get ACF fields
$headline = get_sub_field('headline');
$big_image = get_sub_field('big_image');
$small_image = get_sub_field('small_image');
?>

<section class="about-section-1">
  <div class="about-section-1__grid">
    
    <!-- Left Column: Headline -->
    <?php if ($headline) : ?>
      <div class="about-section-1__headline">
        <h1 class="h3"><?php echo esc_html($headline); ?></h1>
      </div>
    <?php endif; ?>

    <!-- Small Image (Bottom Left) -->
    <?php if ($small_image) : ?>
      <div class="about-section-1__small-image">
        <?php echo wp_get_attachment_image($small_image['ID'], 'small_size', false, ['loading' => 'lazy']); ?>
      </div>
    <?php endif; ?>

    <!-- Large Image (Right) -->
    <?php if ($big_image) : ?>
      <div class="about-section-1__big-image">
        <?php echo wp_get_attachment_image($big_image['ID'], 'large_size', false, ['loading' => 'lazy']); ?>
      </div>
    <?php endif; ?>

  </div>
</section>
