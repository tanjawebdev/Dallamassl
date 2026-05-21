<?php
/**
 * About Section 4 Layout
 * Large moodtext left, large square image center, small text right
 */

// Get ACF fields
$text_right = get_sub_field('text_right');
$image = get_sub_field('image');
?>

<section class="about-section-4">
  <div class="about-section-4__grid">


    <!-- Large Image Center (1:1) -->
    <?php if ($image) : ?>
      <div class="about-section-4__image fade-in">
        <picture>
          <?php echo wp_get_attachment_image($image['ID'], 'large_size', false, ['loading' => 'lazy']); ?>
        </picture>
      </div>
    <?php endif; ?>

    <!-- Small Text Right -->
    <?php if ($text_right) : ?>
      <div class="about-section-4__text-right">
        <p><?php echo esc_html($text_right); ?></p>
      </div>
    <?php endif; ?>

  </div>
</section>
