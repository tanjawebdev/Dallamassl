<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$text = get_sub_field('text');
$buttontext = get_sub_field('buttontext');
$buttonlink = get_sub_field('buttonlink');
$image = get_sub_field('image');
$size = get_sub_field('size');
$pagelink = get_sub_field('pagelink');
?>


<div class="cta-image-wrapper size-<?php echo esc_attr($size); ?> rounded">
  <?php if ($image): ?>
    <div class="cta-image">
      <?php echo wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'img-fluid']); ?>
    </div>
  <?php endif; ?>

  <div class="cta-content">
    <div class="cta-description col-md-6">
      <?php if ($title): ?>
        <h2 class="cta-image-h2"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>

      <?php if ($subtitle): ?>
        <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
      <?php endif; ?>

      <?php if ($text): ?>
        <div class="rte"><?php echo wp_kses_post($text); ?></div>
      <?php endif; ?>
    </div>
    <?php if ($buttontext): ?>
      <a href="<?php echo esc_url($buttonlink); ?>" class="btn btn-hero">
        <span><?php echo esc_html($buttontext); ?></span>
      </a>
    <?php endif; ?>
  </div>
</div>