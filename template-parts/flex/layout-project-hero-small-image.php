<?php
$right_picture = get_sub_field('right_picture');
$small_images = get_sub_field('small_images');

?>

<?php if ($right_picture): ?>
  <div class="project-hero-small-image">
    <div class="container-lg">
      <div class="row">
        <!-- Project Title and Services -->
        <div class="col-12 col-lg-5 offset-lg-1 project-hero-small-left">
          <div class="project-hero-small-left-text">
            <h1 class="project-title"><?php the_title(); ?></h1>
          </div>
          <div class="project-hero-small-left-image">
            <?php foreach ($small_images as $small_image): ?>
              <div class="project-hero-small-img">
                <picture class="object-fit-cover">
                  <?php echo wp_get_attachment_image($small_image['ID'], 'small_size', false, ['class' => 'img-fluid']); ?>
                </picture>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="col-12 col-lg-3 offset-lg-2 project-hero-small-right">
          <picture class="object-fit-cover">
            <?php echo wp_get_attachment_image($right_picture['ID'], 'large_size', false, ['class' => 'img-fluid']); ?>
          </picture>
        </div>
      </div>
    </div>

  </div>
<?php endif; ?>