<?php
/**
 * Home About Teaser Layout
 * Grid with gallery mood images, large image, headline, subheadline, text and link
 */

// Get ACF fields
$gallery = get_sub_field('gallery');
$image = get_sub_field('image');
$headline = get_sub_field('headline');
$subheadline = get_sub_field('subheadline');
$text = get_sub_field('text');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
?>

<div class="home-about-teaser__grid container-lg">

  <!-- Gallery: 4 small mood images (top left) -->
  <?php if ($gallery) : ?>
    <div class="home-about-teaser__gallery">
      <?php foreach ($gallery as $img) : ?>
        <div class="home-about-teaser__gallery-item">
          <?php echo wp_get_attachment_image($img['ID'], 'small', false, ['loading' => 'lazy']); ?>

        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Large image (right) -->
  <?php if ($image) : ?>
    <div class="home-about-teaser__image">
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy">
    </div>
  <?php endif; ?>

  <!-- Headline -->
  <?php if ($headline) : ?>
    <div class="home-about-teaser__headline">
      <h2><?php echo esc_html($headline); ?></h2>
    </div>
  <?php endif; ?>

  <!-- Subheadline -->
  <?php if ($subheadline) : ?>
    <div class="home-about-teaser__subheadline">
      <h3><?php echo esc_html($subheadline); ?></h3>
    </div>
  <?php endif; ?>

  <!-- Text -->
  <?php if ($text) : ?>
    <div class="home-about-teaser__text">
      <?php echo wp_kses_post($text); ?>
    </div>
  <?php endif; ?>

  <!-- Link/CTA -->
  <?php if ($link) : ?>
    <div class="home-about-teaser__link">
      <a href="<?php echo esc_url($link); ?>" class="btn btn-primary btn-big">
        <span><?php echo $linktext ? esc_html($linktext) : 'Welcome to our studio'; ?></span>
      </a>
    </div>
  <?php endif; ?>

</div>
