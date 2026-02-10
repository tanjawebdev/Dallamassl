<?php
/**
 * Service Intro Layout
 * Headline with services list on left, text and link on right
 */

// Get ACF fields
$headline_text = get_sub_field('headline_text');
$services = get_sub_field('services');
$text = get_sub_field('text');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
?>

<section class="service-intro">
  <div class="service-intro__grid">
    
    <!-- Left Column: Headline & Services -->
      <?php if ($headline_text) : ?>
        <h3 class="service-intro__headline">
          <?php echo wpautop($headline_text); ?>
        </h3>
      <?php endif; ?>

      <?php if ($services) : ?>
        <div class="service-intro__services">
          <ul class="service-intro__services-list">
            <?php 
            $counter = 1;
            foreach ($services as $service) : 
              $service_name = $service['service'] ?? '';
            ?>
              <li class="service-intro__service-item h4">
                <span class="service-intro__service-counter"> <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>.</span>
                <span class="service-intro__service-name"><?php echo esc_html($service_name); ?></span>
              </li>
            <?php 
              $counter++;
            endforeach; 
            ?>
          </ul>
        </div>
      <?php endif; ?>

    <!-- Right Column: Text & Link -->
    <div class="service-intro__right">
      <?php if ($text) : ?>
        <div class="service-intro__text">
          <?php echo wpautop($text); ?>
        </div>
      <?php endif; ?>

      <?php if ($link) : ?>
        <div class="service-intro__link">
          <a href="<?php echo esc_url($link); ?>" class="service-intro__cta btn btn-primary">
            <span class="service-intro__cta-text h4">
              <?php echo $linktext ? esc_html($linktext) : 'CONTACT US'; ?>
            </span>
          </a>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>
