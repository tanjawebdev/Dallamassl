<?php
/**
 * Home Service Teaser Layout
 * Grid with headline, milestones, subheadline, text, service taxonomy descriptions and link
 */

// Get ACF fields
$headline = get_sub_field('headline');
$subheadline = get_sub_field('subheadline');
$text = get_sub_field('text');
$milestones = get_sub_field('milestones');
$services = get_sub_field('services');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
?>

<div class="home-service-teaser__grid container-lg">

  <!-- Headline (top left) -->
  <?php if ($headline) : ?>
    <div class="home-service-teaser__headline">
      <h2><?php echo esc_html($headline); ?></h2>
    </div>
  <?php endif; ?>

  <!-- Milestones (middle left, numbered list) -->
  <?php if ($milestones && is_array($milestones)) : ?>
    <div class="home-service-teaser__milestones">
      <ol class="home-service-teaser__milestone-list">
        <?php foreach ($milestones as $index => $milestone) : ?>
          <li class="home-service-teaser__milestone-item">
            <span class="home-service-teaser__milestone-number h4"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>.</span>
            <span class="home-service-teaser__milestone-text h4"><?php echo esc_html($milestone['step']); ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  <?php endif; ?>

  <!-- Subheadline (top right) -->
  <?php if ($subheadline) : ?>
    <div class="home-service-teaser__subheadline h3">
      <?php echo wp_kses_post($subheadline); ?>
    </div>
  <?php endif; ?>

  <!-- Text (below subheadline) -->
  <?php if ($text) : ?>
    <div class="home-service-teaser__text">
      <?php echo wp_kses_post($text); ?>
    </div>
  <?php endif; ?>

  <!-- Services taxonomy descriptions (bottom row) -->
  <?php if ($services && is_array($services)) : ?>
    <div class="home-service-teaser__services">
      <?php foreach ($services as $service_row) :
        $service_term_id = $service_row['service'];
        $service_term = $service_term_id ? get_term($service_term_id) : null;
      ?>
        <?php if ($service_term && !is_wp_error($service_term)) : ?>
          <div class="home-service-teaser__service-item" id="service-<?php echo esc_attr($service_term_id); ?>">
            <a href="<?php echo esc_url($link); ?>#service-<?php echo esc_attr($service_term_id); ?>" class="h4">
                <?php echo esc_html($service_term->name); ?>
            </a>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Link/CTA (bottom right) -->
  <?php if ($link) : ?>
    <div class="home-service-teaser__link">
      <a href="<?php echo esc_url($link); ?>" class="btn btn-primary btn-big">
        <span><?php echo $linktext ? esc_html($linktext) : 'Go to Service'; ?></span>
      </a>
    </div>
  <?php endif; ?>

</div>
