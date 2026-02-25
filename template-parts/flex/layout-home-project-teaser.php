<?php
/**
 * Home Project Teaser Layout
 * Grid with headline, subheadline, description, 3 project teasers and a link
 */

// Get ACF fields
$headline = get_sub_field('headline');
$subheadline = get_sub_field('subheadline');
$description = get_sub_field('description');
$link = get_sub_field('link');
$linktext = get_sub_field('linktext');
$project_teaser_one = get_sub_field('project_teaser_one');   // Post Object – portrait, top right
$project_teaser_two = get_sub_field('project_teaser_two');   // Post Object – portrait, left
$project_teaser_three = get_sub_field('project_teaser_three'); // Post Object – landscape, bottom right
?>

<div class="home-project-teaser__grid container-lg">

  <?php if ($subheadline || $description) : ?>
  <div class="home-project-teaser__texts">
    <!-- Subheadline (middle top) -->
    <?php if ($subheadline) : ?>
      <div class="home-project-teaser__subheadline">
        <h3><?php echo esc_html($subheadline); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Description (below subheadline) -->
    <?php if ($description) : ?>
        <div class="home-project-teaser__description">
        <?php echo wpautop($description); ?>
        </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <!-- Teaser 1: portrait, top right -->
  <?php if ($project_teaser_one) :
    $t1_id = $project_teaser_one->ID;
    $t1_title = get_the_title($t1_id);
    $t1_image_acf = get_field('featured_image_portrait', $t1_id);
    $t1_image = $t1_image_acf ? $t1_image_acf['url'] : '';
    $t1_url = get_permalink($t1_id);
    $t1_year = get_the_date('Y', $t1_id);
  ?>
    <?php if ($t1_image) : ?>
      <a href="<?php echo esc_url($t1_url); ?>" class="home-project-teaser__teaser home-project-teaser__teaser--one">
        <div class="home-project-teaser__image hover-round">
          <img src="<?php echo esc_url($t1_image); ?>" alt="<?php echo esc_attr($t1_title); ?>" loading="lazy">
        </div>
        <div class="home-project-teaser__meta">
          <span class="home-project-teaser__title description"><?php echo esc_html($t1_title); ?></span>
          <span class="home-project-teaser__year description"><?php echo esc_html($t1_year); ?></span>
        </div>
      </a>
    <?php endif; ?>
  <?php endif; ?>


  <div class="home-project-teaser__teaser--two">
    <!-- Headline (top left) -->
  <?php if ($headline) : ?>
    <div class="home-project-teaser__headline">
      <h2><?php echo esc_html($headline); ?></h2>
    </div>
  <?php endif; ?>

  <!-- Teaser 2: portrait, left -->
  <?php if ($project_teaser_two) :
    $t2_id = $project_teaser_two->ID;
    $t2_title = get_the_title($t2_id);
    $t2_image_acf = get_field('featured_image_portrait', $t2_id);
    $t2_image = $t2_image_acf ? $t2_image_acf['url'] : '';
    $t2_url = get_permalink($t2_id);
    $t2_year = get_the_date('Y', $t2_id);
  ?>
    <?php if ($t2_image) : ?>
      <a href="<?php echo esc_url($t2_url); ?>" class="home-project-teaser__teaser">
        <div class="home-project-teaser__image hover-round">
          <img src="<?php echo esc_url($t2_image); ?>" alt="<?php echo esc_attr($t2_title); ?>" loading="lazy">
        </div>
        <div class="home-project-teaser__meta">
          <span class="home-project-teaser__title description"><?php echo esc_html($t2_title); ?></span>
          <span class="home-project-teaser__year description"><?php echo esc_html($t2_year); ?></span>
        </div>
      </a>
    <?php endif; ?>
  <?php endif; ?>
  </div>

  <!-- Link/CTA -->
  <?php if ($link) : ?>
    <div class="home-project-teaser__link">
      <a href="<?php echo esc_url($link); ?>" class="btn btn-primary btn-big">
        <span><?php echo $linktext ? esc_html($linktext) : 'See all of our projects'; ?></span>
      </a>
    </div>
  <?php endif; ?>

  <!-- Teaser 3: landscape, bottom right -->
  <?php if ($project_teaser_three) :
    $t3_id = $project_teaser_three->ID;
    $t3_title = get_the_title($t3_id);
    $t3_image_acf = get_field('featured_image_landscape', $t3_id);
    $t3_image = $t3_image_acf ? $t3_image_acf['url'] : '';
    $t3_url = get_permalink($t3_id);
    $t3_year = get_the_date('Y', $t3_id);
  ?>
    <?php if ($t3_image) : ?>
      <a href="<?php echo esc_url($t3_url); ?>" class="home-project-teaser__teaser home-project-teaser__teaser--three">
        <div class="home-project-teaser__image hover-round">
          <img src="<?php echo esc_url($t3_image); ?>" alt="<?php echo esc_attr($t3_title); ?>" loading="lazy">
        </div>
        <div class="home-project-teaser__meta">
          <span class="home-project-teaser__title description"><?php echo esc_html($t3_title); ?></span>
          <span class="home-project-teaser__year description"><?php echo esc_html($t3_year); ?></span>
        </div>
      </a>
    <?php endif; ?>
  <?php endif; ?>

</div>
