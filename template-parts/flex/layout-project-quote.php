<?php
/**
 * Project Quote Layout
 * Horizontally scrolling quote cards with title and contact link
 */

// Get ACF fields
$title = get_sub_field('title');
$quotes = get_sub_field('quote');
$link = get_sub_field('link');
?>

<div class="project-quote__header container-lg">
  <?php if ($title) : ?>
    <h2 class="project-quote__heading h3"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>
</div>

<?php if ($quotes && is_array($quotes)) : ?>
  <div class="project-quote__slider">
    <?php foreach ($quotes as $quote) : ?>
      <div class="project-quote__card">
        <div class="project-quote__top-content">
          <div class="project-quote__icon"></div>
          <?php if (!empty($quote['text'])) : ?>
            <p class="project-quote__text"><?php echo esc_html($quote['text']); ?></p>
          <?php endif; ?>
        </div>
        <?php if (!empty($quote['autor'])) : ?>
          <span class="project-quote__author h5">&ndash; <?php echo esc_html($quote['autor']); ?></span>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="project-quote__footer container-lg">
  <a href="<?php echo esc_url($link['url']); ?>" class="project-quote__contact-link btn btn-primary"><?php echo esc_html($link['title']); ?></a>
</div>
