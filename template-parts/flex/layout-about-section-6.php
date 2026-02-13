<?php
/**
 * About Section 6 Layout
 * Two-column layout with images and text content
 */

// Get ACF fields
$image_left = get_sub_field('image_left');
$moodtext = get_sub_field('moodtext');
$text_top = get_sub_field('text_top');
$image_right = get_sub_field('image_right');
?>

<section class="about-section-6">
  <div class="about-section-6__grid container-lg">
    
    <!-- Left Image -->
    <?php if ($image_left) : ?>
      <div class="about-section-6__image-left">
        <?php 
        echo wp_get_attachment_image(
          $image_left['ID'], 
          'large',
          false,
          ['class' => 'about-section-6__img']
        ); 
        ?>
      </div>
    <?php endif; ?>

    <!-- Top Text -->
    <?php if ($text_top) : ?>
      <div class="about-section-6__text-top">
        <p><?php echo esc_html($text_top); ?></p>
      </div>
    <?php endif; ?>

    <!-- Mood Text (Studio Statement) -->
    <?php if ($moodtext) : ?>
      <div class="about-section-6__moodtext">
        <h3><?php echo nl2br(esc_html($moodtext)); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Right Image -->
    <?php if ($image_right) : ?>
      <div class="about-section-6__image-right">
        <?php 
        echo wp_get_attachment_image(
          $image_right['ID'], 
          'large',
          false,
          ['class' => 'about-section-6__img']
        ); 
        ?>
      </div>
    <?php endif; ?>

  </div>
</section>
