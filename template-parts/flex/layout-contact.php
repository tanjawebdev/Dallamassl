<?php
/**
 * Contact Layout
 * Two-column contact section with address info and WPForms form
 */

// Get ACF fields
$headline = get_sub_field('headline');
$moodtext = get_sub_field('moodtext');
$address = get_sub_field('address');
$wpforms_code = get_sub_field('wpforms_code');
?>

<div class="contact__grid container-lg">
  <div class="contact__left">
    <?php if ($headline) : ?>
      <h2 class="contact__headline h3"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>

    <?php if ($moodtext) : ?>
      <p class="contact__moodtext h3"><?php echo esc_html($moodtext); ?></p>
    <?php endif; ?>
  </div>

  <div class="contact__right">
    <?php if ($address) : ?>
      <div class="contact__address h4">
        <?php echo wp_kses_post($address); ?>
      </div>
    <?php endif; ?>

    <?php if ($wpforms_code) : ?>
      <div class="contact__form">
        <?php echo do_shortcode($wpforms_code); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
