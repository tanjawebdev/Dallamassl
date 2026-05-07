<?php
$big_picture = get_sub_field('big_picture');
$small_picture = get_sub_field('small_picture');

?>

<?php if ($big_picture): ?>
  <div class="project-hero-big-image">
    <div class="container-lg">
      <div class="row">
        <!-- Project Title and Services -->
        <div class="col-12 col-lg-4 col-xxxl-3 offset-xxxl-1 project-hero-big-left">
          <div class="project-hero-big-left-text">
            <h1 class="project-title"><?php the_title(); ?></h1>
          </div>
          <div class="project-hero-big-left-image">
            <picture class="object-fit-cover">
              <?php echo wp_get_attachment_image($small_picture['ID'], 'small_size', false, ['class' => 'img-fluid']); ?>
            </picture>
          </div>
        </div>

        <div class="col-12 col-lg-7 project-hero-big-right">
          <picture class="object-fit-cover">
            <?php echo wp_get_attachment_image($big_picture['ID'], 'large_size', false, ['class' => 'img-fluid']); ?>
          </picture>
        </div>
      </div>
    </div>

  </div>
<?php endif; ?>