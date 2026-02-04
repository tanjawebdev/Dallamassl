<?php
$text = get_sub_field('text');
$section_container_size = get_sub_field('container');
$use_lg_cols = ($section_container_size === 'container-lg');
$column_class = $use_lg_cols ? 'col-lg-6' : 'col-12';
$offset_class = ($use_lg_cols && $alignment === 'middle') ? 'offset-lg-3' : '';
$classes = trim("$column_class $offset_class");
?>

<div class="<?php echo $classes; ?>">
  <?php if ($text): ?>
    <div class="body-text rte">
      <?php echo wp_kses_post($text); ?>

    </div>
  <?php endif; ?>
</div>