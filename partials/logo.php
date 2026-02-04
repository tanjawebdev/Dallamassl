<?php
/**
 * Logo Component
 * Animated logo for site branding
 */
?>

<div class="logo-container container-lg" data-logo-container>
  <?php
    $svg_path = get_template_directory() . '/static/img/logo-animation-2.svg';
    if (file_exists($svg_path)) {
      echo file_get_contents($svg_path);
    }
  ?>
</div>