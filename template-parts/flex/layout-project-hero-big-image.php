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
            <?php 
            $services = get_the_terms(get_the_ID(), 'service');
            if ($services && !is_wp_error($services)) :
            ?>
              <div class="project-services">
                <?php foreach ($services as $service) : ?>
                  <h3 class="project-hero-big-service"><?php echo esc_html($service->name); ?></h3>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="project-hero-big-left-image">
            <picture class="object-fit-cover">
              <?php echo wp_get_attachment_image($small_picture['ID'], 'small', false, ['class' => 'img-fluid']); ?>
            </picture>
          </div>
        </div>

        <div class="col-12 col-lg-7 project-hero-big-right">
          <picture class="object-fit-cover">
            <?php echo wp_get_attachment_image($big_picture['ID'], 'large', false, ['class' => 'img-fluid']); ?>
          </picture>
        </div>
      </div>
    </div>

  </div>
<?php endif; ?>