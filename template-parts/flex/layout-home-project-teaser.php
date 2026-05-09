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

  <!-- Teaser 1: portrait on desktop, landscape on mobile -->
  <?php if ($project_teaser_one) :
    $t1_id = $project_teaser_one->ID;
    $t1_title = get_the_title($t1_id);
    $t1_portrait_acf   = get_field('featured_image_portrait', $t1_id);
    $t1_landscape_acf  = get_field('featured_image_landscape', $t1_id);
    $t1_url = get_permalink($t1_id);
    // Fallback: use whichever image is available
    $t1_any = $t1_portrait_acf ?: $t1_landscape_acf;
  ?>
    <?php if ($t1_any) : ?>
      <a href="<?php echo esc_url($t1_url); ?>" class="home-project-teaser__teaser home-project-teaser__teaser--one">
        <div class="home-project-teaser__image hover-round">
          <picture>
            <?php if ($t1_landscape_acf) :
              $t1_landscape_src = wp_get_attachment_image_src($t1_landscape_acf['ID'], 'medium_size');
            ?>
              <source media="(max-width: 768px)" srcset="<?php echo esc_url($t1_landscape_src[0]); ?>">
            <?php endif; ?>
            <?php if ($t1_portrait_acf) : ?>
              <?php echo wp_get_attachment_image($t1_portrait_acf['ID'], 'medium_size', false, ['loading' => 'lazy', 'alt' => esc_attr($t1_title)]); ?>
            <?php elseif ($t1_landscape_acf) : ?>
              <?php echo wp_get_attachment_image($t1_landscape_acf['ID'], 'medium_size', false, ['loading' => 'lazy', 'alt' => esc_attr($t1_title)]); ?>
            <?php endif; ?>
          </picture>
        </div>
        <div class="home-project-teaser__meta">
          <span class="home-project-teaser__title description"><?php echo esc_html($t1_title); ?></span>
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

  <!-- Teaser 2: portrait on desktop, landscape on mobile -->
  <?php if ($project_teaser_two) :
    $t2_id = $project_teaser_two->ID;
    $t2_title = get_the_title($t2_id);
    $t2_portrait_acf   = get_field('featured_image_portrait', $t2_id);
    $t2_landscape_acf  = get_field('featured_image_landscape', $t2_id);
    $t2_url = get_permalink($t2_id);
    $t2_any = $t2_portrait_acf ?: $t2_landscape_acf;
  ?>
    <?php if ($t2_any) : ?>
      <a href="<?php echo esc_url($t2_url); ?>" class="home-project-teaser__teaser">
        <div class="home-project-teaser__image hover-round">
          <picture>
            <?php if ($t2_landscape_acf) :
              $t2_landscape_src = wp_get_attachment_image_src($t2_landscape_acf['ID'], 'medium_size');
            ?>
              <source media="(max-width: 768px)" srcset="<?php echo esc_url($t2_landscape_src[0]); ?>">
            <?php endif; ?>
            <?php if ($t2_portrait_acf) : ?>
              <?php echo wp_get_attachment_image($t2_portrait_acf['ID'], 'medium_size', false, ['loading' => 'lazy', 'alt' => esc_attr($t2_title)]); ?>
            <?php elseif ($t2_landscape_acf) : ?>
              <?php echo wp_get_attachment_image($t2_landscape_acf['ID'], 'medium_size', false, ['loading' => 'lazy', 'alt' => esc_attr($t2_title)]); ?>
            <?php endif; ?>
          </picture>
        </div>
        <div class="home-project-teaser__meta">
          <span class="home-project-teaser__title description"><?php echo esc_html($t2_title); ?></span>
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

  <!-- Teaser 3: always landscape -->
  <?php if ($project_teaser_three) :
    $t3_id = $project_teaser_three->ID;
    $t3_title = get_the_title($t3_id);
    $t3_landscape_acf = get_field('featured_image_landscape', $t3_id);
    $t3_url = get_permalink($t3_id);
  ?>
    <?php if ($t3_landscape_acf) : ?>
      <a href="<?php echo esc_url($t3_url); ?>" class="home-project-teaser__teaser home-project-teaser__teaser--three">
        <div class="home-project-teaser__image hover-round">
          <?php echo wp_get_attachment_image($t3_landscape_acf['ID'], 'medium_size', false, ['loading' => 'lazy', 'alt' => esc_attr($t3_title)]); ?>
        </div>
        <div class="home-project-teaser__meta">
          <span class="home-project-teaser__title description"><?php echo esc_html($t3_title); ?></span>
        </div>
      </a>
    <?php endif; ?>
  <?php endif; ?>

</div>
