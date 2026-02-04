<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$text = get_sub_field('text');
$buttontext = get_sub_field('buttontext');
$buttonlink = get_sub_field('buttonlink');
$image = get_sub_field('image');
?>

<div class="row align-items-center g-5">
  <div class="col-md-6 order-2 order-md-1 content">
    <?php if ($subtitle): ?>
      <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>

    <?php if ($title): ?>
      <h2 class="image-text-h2"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($text): ?>
      <div class="rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>

    <?php if ($buttontext): ?>
      <a href="<?php echo esc_url($buttonlink); ?>" class="btn btn-primary"><?php echo esc_html($buttontext); ?></a>
    <?php endif; ?>
  </div>

  <div class="col-md-6 order-1 order-md-2 image-wrapper">
    <?php if ($image): ?>
      <div class="aspect-ratio-box ratio-3-4">
        <?php echo wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'img-fluid rounded aspect-ratio-image']); ?>
      </div>
    <?php endif; ?>
  </div>

</div>