<?php
$text = get_sub_field('text');
$file_data = get_sub_field('downloadfile');
$file_url = $file_data['url'];
$file_name = $file_data['filename'];
?>

<?php if ($file_url): ?>
  <div class="download-wrapper">
    <?php if ($text): ?>
      <h2><?php echo esc_html($text); ?></h2>
    <?php endif; ?>


    <div class="download-link">
      <a href="<?php echo esc_url($file_url); ?>" class="btn btn-primary"
        download="<?php echo esc_attr($file_name); ?>">Download</a>
    </div>
  <?php endif; ?>
</div>