<?php
$big_picture   = get_sub_field('big_picture');
$small_picture = get_sub_field('small_picture');
?>

<?php if ($big_picture): ?>
<section class="project-hero-big-image">
  <div class="container-lg">
    <div class="project-hero-big-image__grid">

      <!-- Left: Title -->
      <div class="project-hero-big-image__title">
        <h1 class="project-title"><?php the_title(); ?></h1>
      </div>

      <!-- Left bottom: Small portrait image -->
      <?php if ($small_picture): ?>
        <div class="project-hero-big-image__small-image">
          <picture>
            <?php echo wp_get_attachment_image($small_picture['ID'], 'small_size', false, ['loading' => 'lazy']); ?>
          </picture>
        </div>
      <?php endif; ?>

      <!-- Right: Big landscape image -->
      <div class="project-hero-big-image__main-image">
        <picture>
          <?php echo wp_get_attachment_image($big_picture['ID'], 'large_size', false, ['loading' => 'eager']); ?>
        </picture>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>