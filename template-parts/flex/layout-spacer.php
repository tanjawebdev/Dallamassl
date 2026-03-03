<?php
/**
 * Spacer Layout
 * Outputs vertical spacing based on ACF select value
 */

$spacing = get_sub_field('spacingvalue');
if ($spacing) : ?>
  <div class="spacer" style="height: <?php echo esc_attr($spacing); ?>px;" aria-hidden="true"></div>
<?php endif; ?>
