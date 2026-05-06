<?php
/**
 * Contact Layout
 * Two-column contact section with address info and WPForms form
 */

// Get ACF fields
$headline = get_sub_field('headline');
$address = get_sub_field('address');
$wpforms_code = get_sub_field('wpforms_code');
?>

<div class="contact__grid container-lg">
  <div class="contact__headline-part">
    <?php if ($headline) : ?>
      <h2 class="contact__headline h3"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>
  </div>
  
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
