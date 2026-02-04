<?php
$image = get_sub_field('image');
$video = get_sub_field('video');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$title_tag = get_sub_field('title_tag') ?: 'h2';
$height = get_sub_field('height') ?: '50';
$height_class = $height === '100' ? 'hero-single-full-height' : 'hero-single-half-height';
$title_tag = in_array($title_tag, ['h1', 'h2', 'h3']) ? $title_tag : 'h2';
?>
<div class="hero-single typo-white <?php echo esc_attr($height_class); ?>">
  <div class="hero-single-content">
    <?php if ($subtitle): ?>
      <p class="subtitle hero-single-subtitle"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>
    <?php if ($title): ?>
      <<?php echo tag_escape($title_tag); ?> class="hero-single-title">
        <?php echo esc_html($title); ?>
      </<?php echo tag_escape($title_tag); ?>>
    <?php endif; ?>
  </div>

  <div class="hero-media">

    <?php if ($image): ?>
      <picture class="hero-picture">
        <?php echo wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'img-fluid']); ?>
      </picture>
    <?php endif; ?>

    <?php if ($video): ?>
      <video autoplay loop muted playsinline>
        <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
        Your browser does not support the video tag.
      </video>
    <?php endif; ?>
  </div>
</div>