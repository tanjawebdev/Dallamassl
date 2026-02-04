<?php
/**
 * Logo Component
 * Animated logo for site branding
 */
?>

<div class="logo-container container-lg">
  <?php
    $svg_path = get_template_directory() . '/static/img/logo-long-text.svg';
    if (file_exists($svg_path)) {
      echo file_get_contents($svg_path);
    }
  ?>
</div>