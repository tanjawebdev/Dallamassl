<?php
/**
 * About Section 5 Layout
 * Text-focused layout with logo and three content columns
 */

// Get ACF fields
$headline_1 = get_sub_field('headline_1');
$moodtext_1 = get_sub_field('moodtext_1');
$headline_2 = get_sub_field('headline_2');
$moodtext_2 = get_sub_field('moodtext_2');
$headline_3 = get_sub_field('headline_3');
$moodtext_3 = get_sub_field('moodtext_3');
?>

<section class="about-section-5">
  <div class="about-section-5__grid">
    
    <!-- Welcome Text (Top) -->
    <div class="about-section-5__welcome">
      <p class="h3">WELCOME TO OUR STUDIO.</p>
    </div>

    <!-- Large Logo (Center Top) -->
    <div class="about-section-5__logo-wrapper"></div>

    <!-- Sticky Logo -->
    <div class="about-section-5__logo container-lg">
        <?php
            $svg_path = get_template_directory() . '/static/img/logo-long-text.svg';
            if (file_exists($svg_path)) {
            echo file_get_contents($svg_path);
            }
        ?>
        </div>

    <!-- Headline 1 (Left) -->
    <?php if ($headline_1) : ?>
      <div class="about-section-5__headline-1">
        <h3><?php echo esc_html($headline_1); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Text 1 (Left) -->
    <?php if ($moodtext_1) : ?>
      <div class="about-section-5__text-1">
        <p><?php echo esc_html($moodtext_1); ?></p>
      </div>
    <?php endif; ?>

    <!-- Headline 2 (Center) -->
    <?php if ($headline_2) : ?>
      <div class="about-section-5__headline-2">
        <h3><?php echo esc_html($headline_2); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Text 2 (Center) -->
    <?php if ($moodtext_2) : ?>
      <div class="about-section-5__text-2">
        <p><?php echo esc_html($moodtext_2); ?></p>
      </div>
    <?php endif; ?>

    <!-- Headline 3 (Right) -->
    <?php if ($headline_3) : ?>
      <div class="about-section-5__headline-3">
        <h3><?php echo esc_html($headline_3); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Text 3 (Right) -->
    <?php if ($moodtext_3) : ?>
      <div class="about-section-5__text-3">
        <p><?php echo esc_html($moodtext_3); ?></p>
      </div>
    <?php endif; ?>

  </div>
</section>
