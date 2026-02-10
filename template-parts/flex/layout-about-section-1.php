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
        <img src="<?php echo esc_url($small_image['url']); ?>" alt="<?php echo esc_attr($small_image['alt']); ?>" loading="lazy">
      </div>
    <?php endif; ?>

    <!-- Large Image (Right) -->
    <?php if ($big_image) : ?>
      <div class="about-section-1__big-image">
        <img src="<?php echo esc_url($big_image['url']); ?>" alt="<?php echo esc_attr($big_image['alt']); ?>" loading="lazy">
      </div>
    <?php endif; ?>

  </div>
</section>
