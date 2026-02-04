<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$direction = get_sub_field('direction');
?>

<div class="statement statement-<?php echo esc_attr($direction ?: 'top'); ?>">
  <?php if ($title): ?>
    <h1><?php echo esc_html($title); ?></h1>
  <?php endif; ?>

  <?php if ($subtitle): ?>
    <h3 class="subtitle"><?php echo esc_html($subtitle); ?></h3>
  <?php endif; ?>
</div>