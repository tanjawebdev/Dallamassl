<?php
/**
 * About Section 7 Layout
 * Cooperation Partners Section with repeater
 */

// Get ACF fields
$title = get_sub_field('title');
$partner = get_sub_field('partner');
?>

<section class="about-section-7">
  <div class="about-section-7__container container-lg">
    
    <?php if ($title) : ?>
      <div class="about-section-7__header">
        <h2 class="about-section-7__title"><?php echo esc_html($title); ?></h2>
      </div>
    <?php endif; ?>

    <?php if (have_rows('partner')) : ?>
      <div class="about-section-7__partners">
        <?php while (have_rows('partner')) : the_row(); 
          $company_name = get_sub_field('company_name');
          $description = get_sub_field('description');
          $location = get_sub_field('location');
        ?>
          <div class="about-section-7__partner row">
            <?php if ($company_name) : ?>
              <span class="about-section-7__company h4 col-12 col-lg-4 offset-lg-2"><?php echo esc_html($company_name); ?></span>
            <?php endif; ?>
            
            <?php if ($description) : ?>
              <span class="about-section-7__description h4 col-12 col-lg-4"><?php echo esc_html($description); ?></span>
            <?php endif; ?>
            
            <?php if ($location) : ?>
              <span class="about-section-7__location h4 col-12 col-lg-2"><?php echo esc_html($location); ?></span>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
