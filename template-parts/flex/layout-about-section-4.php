<?php
/**
 * About Section 4 Layout
 * Large moodtext left, large square image center, small text right
 */

// Get ACF fields
$text_right = get_sub_field('text_right');
$moodtext = get_sub_field('moodtext');
$image = get_sub_field('image');
?>

<section class="about-section-4">
  <div class="about-section-4__grid">
    
    <!-- Moodtext/Headline (Left) -->
    <?php if ($moodtext) : ?>
      <div class="about-section-4__moodtext">
        <h3><?php echo esc_html($moodtext); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Large Image Center (1:1) -->
    <?php if ($image) : ?>
      <div class="about-section-4__image">
        <picture>
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy">
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
