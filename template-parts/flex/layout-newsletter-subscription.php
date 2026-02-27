<?php
/**
 * Newsletter Subscription Layout
 * Headline with MC4WP Mailchimp signup form
 */

// Get ACF fields
$headline = get_sub_field('headline');
?>

<div class="newsletter__grid container-lg">

  <?php if ($headline) : ?>
    <div class="newsletter__headline">
      <h4><?php echo esc_html($headline); ?></h4>
    </div>
  <?php endif; ?>

  <div class="newsletter__form">
    <?php echo do_shortcode('[mc4wp_form id="362"]'); ?>
  </div>

</div>
