<?php
/**
 * Hero Gallery Mouse Position
 * ACF Gallery field that displays images
 */

$images = get_sub_field('images'); // ACF Gallery field
$headline = get_sub_field('headline') ?: '';
?>

<h3><?php echo esc_html($headline); ?></h3>
<?php if ($images): ?>
  <div class="hero-gallery-mouse-position" data-hero-gallery-mouse>
    <div class="gallery-container">
      <?php foreach ($images as $image): ?>
        <div class="gallery-item" data-gallery-item>
          <?php 
          echo wp_get_attachment_image(
            $image['ID'], 
            'large', 
            false, 
            [
              'class' => 'gallery-image',
              'alt' => $image['alt'] ?: $image['title']
            ]
          ); 
          ?>
          
          <?php if ($image['caption']): ?>
            <div class="gallery-caption">
              <?php echo wp_kses_post($image['caption']); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>