<?php
$items = get_sub_field('timeline');
$image = get_sub_field('image');
?>
<div class="timeline row">
<?php if ($image): ?>
  <div class="timeline-image col-12 col-md-6">
    <div class="timeline-image-wrapper">
      <picture>
        <?php echo wp_get_attachment_image($image['ID'], 'medium', false, ['class' => 'img-fluid rounded']); ?>
      </picture>
    </div>
  </div>
<?php endif; ?>
<?php if ($items): ?>
  <div class="timeline-text col-12 col-md-6">
    <?php foreach ($items as $item): ?>
      <div class="timeline-item">
        <?php if ($item['year']): ?>
          <h3><?php echo esc_html($item['year']); ?></h3>
        <?php endif; ?>
        <?php if ($item['text']): ?>
          <div class="timeline-textpart">
            <?php echo wp_kses_post($item['text']); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
</div>