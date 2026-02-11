<?php
/**
 * About Section 3 Layout
 * Complex grid with multiple images and text blocks
 */

// Get ACF fields
$text_left = get_sub_field('text_left');
$text_bottom = get_sub_field('text_bottom');
$image_left = get_sub_field('image_left');
$image_top_one = get_sub_field('image_top_one');
$image_top_two = get_sub_field('image_top_two');
$images_small_bottom_right = get_sub_field('images_small_bottom-right');
?>

<section class="about-section-3">
  <div class="about-section-3__grid">
    
    <!-- Text Top Left -->
    <?php if ($text_left) : ?>
      <div class="about-section-3__text-left">
        <p><?php echo esc_html($text_left); ?></p>
      </div>
    <?php endif; ?>

    <!-- Medium Image Left (4:5) -->
    <?php if ($image_left) : ?>
      <div class="about-section-3__image-left">
        <picture>
          <img src="<?php echo esc_url($image_left['url']); ?>" alt="<?php echo esc_attr($image_left['alt']); ?>" loading="lazy">
        </picture>
      </div>
    <?php endif; ?>

    <!-- Text Bottom Left -->
    <?php if ($text_bottom) : ?>
      <div class="about-section-3__text-bottom">
        <p><?php echo esc_html($text_bottom); ?></p>
      </div>
    <?php endif; ?>

    <!-- Medium Image Top One (4:5) -->
    <?php if ($image_top_one) : ?>
      <div class="about-section-3__image-top-one">
        <picture>
          <img src="<?php echo esc_url($image_top_one['url']); ?>" alt="<?php echo esc_attr($image_top_one['alt']); ?>" loading="lazy">
        </picture>
      </div>
    <?php endif; ?>

    <!-- Medium Image Top Two (4:5) -->
    <?php if ($image_top_two) : ?>
      <div class="about-section-3__image-top-two">
        <picture>
          <img src="<?php echo esc_url($image_top_two['url']); ?>" alt="<?php echo esc_attr($image_top_two['alt']); ?>" loading="lazy">
        </picture>
      </div>
    <?php endif; ?>

    <!-- Small Images Bottom Right (Gallery 1-3 images) -->
    <?php if ($images_small_bottom_right) : ?>
      <div class="about-section-3__images-small">
        <?php foreach ($images_small_bottom_right as $image) : ?>
          <div class="about-section-3__small-image">
            <picture>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy">
            </picture>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
