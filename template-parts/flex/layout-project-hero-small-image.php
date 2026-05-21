<?php
$right_picture = get_sub_field('right_picture');
$small_images  = get_sub_field('small_images');
?>

<?php if ($right_picture): ?>
<section class="project-hero-small-image">
  <div class="container-lg">
    <div class="project-hero-small-image__grid">

      <!-- Left: Title -->
      <div class="project-hero-small-image__title">
        <h1 class="project-title"><?php the_title(); ?></h1>
      </div>

      <!-- Left bottom: Small images -->
      <?php if ($small_images): ?>
        <div class="project-hero-small-image__small-images">
          <?php foreach ($small_images as $small_image): ?>
            <div class="project-hero-small-image__small-img">
              <picture>
                <?php echo wp_get_attachment_image($small_image['ID'], 'small_size', false, ['loading' => 'lazy']); ?>
              </picture>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Right: Big portrait image -->
      <div class="project-hero-small-image__main-image">
        <picture>
          <?php echo wp_get_attachment_image($right_picture['ID'], 'large_size', false, ['loading' => 'eager']); ?>
        </picture>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>