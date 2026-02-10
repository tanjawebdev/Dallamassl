<?php
/**
 * Layout: Project Related Work
 * Displays previous and next projects with featured images and project types
 */

global $post;

// Get previous and next projects
$prev_post = get_previous_post(false, '', 'project_type');
$next_post = get_next_post(false, '', 'project_type');

// Wrap-around logic: if no previous, get the last project
if (!$prev_post) {
    $last_projects = get_posts(array(
        'post_type'      => 'project',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC', // Get the oldest (first) project
        'post_status'    => 'publish',
        'post__not_in'   => array($post->ID)
    ));
    if (!empty($last_projects)) {
        $prev_post = $last_projects[0];
    }
}

// Wrap-around logic: if no next, get the first project
if (!$next_post) {
    $first_projects = get_posts(array(
        'post_type'      => 'project',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'ASC', // Get the newest (last) project
        'post_status'    => 'publish',
        'post__not_in'   => array($post->ID)
    ));
    if (!empty($first_projects)) {
        $next_post = $first_projects[0];
    }
}

// Always display since we always have projects with wrap-around
if ($prev_post || $next_post) :
?>

<div class="project-related-next container-lg">
  <!-- Next Project Link-->
   <a href="<?php echo get_permalink($next_post->ID); ?>" class="btn btn-primary">
    <span class="h4">Next Project</span>
   </a>
</div>


<section class="section project-related-work">
  <div class="container-lg">
    <div class="row">
      <div class="col-12 col-md-3 offset-md-1 project-related-work__nav">
        <div class="project-related-work__content">
          <!-- Previous Project -->
          <div class="project-related-work__item <?php echo !$prev_post ? 'project-related-work__item--empty' : ''; ?>">
            <?php if ($prev_post) : 
              $prev_thumbnail = get_the_post_thumbnail_url($prev_post->ID, 'large');
              $prev_types = get_the_terms($prev_post->ID, 'project_type');
              $prev_type_label = $prev_types && !is_wp_error($prev_types) ? esc_html($prev_types[0]->name) : '';
            ?>
              <a href="<?php echo get_permalink($prev_post->ID); ?>" class="project-related-work__link">
                <div class="project-related-work__image hover-round <?php echo !$prev_thumbnail ? 'project-related-work__image--placeholder' : ''; ?>">
                  <?php if ($prev_thumbnail) : ?>
                    <img src="<?php echo esc_url($prev_thumbnail); ?>" alt="<?php echo esc_attr(get_the_title($prev_post->ID)); ?>" class="img-fluid">
                  <?php endif; ?>
                </div>
                <div class="project-related-work__meta">
                  <span class="project-related-work__project-title description"><?php echo get_the_title($prev_post->ID); ?></span>
                  <?php if ($prev_type_label) : ?>
                    <span class="project-related-work__type description"><?php echo $prev_type_label; ?></span>
                  <?php endif; ?>
                </div>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4 project-related-work__text-wrapper">
        <h4 class="project-related-work__title">RELATED WORK</h4>
        <h3 class="project-related-work__tagline">
          <p>THE<br>ESSENCE<br>OF ROOMS</p>
        </h3>
      </div>

      <div class="col-12 col-md-3 project-related-work__nav">
        <div class="project-related-work__content">
          <!-- Next Project -->
          <div class="project-related-work__item <?php echo !$next_post ? 'project-related-work__item--empty' : ''; ?>">
            <?php if ($next_post) : 
              $next_thumbnail = get_the_post_thumbnail_url($next_post->ID, 'large');
                $next_types = get_the_terms($next_post->ID, 'project_type');
                $next_type_label = $next_types && !is_wp_error($next_types) ? esc_html($next_types[0]->name) : '';
              ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="project-related-work__link">
                  <div class="project-related-work__image hover-round <?php echo !$next_thumbnail ? 'project-related-work__image--placeholder' : ''; ?>">
                    <?php if ($next_thumbnail) : ?>
                      <img src="<?php echo esc_url($next_thumbnail); ?>" alt="<?php echo esc_attr(get_the_title($next_post->ID)); ?>" class="img-fluid">
                    <?php endif; ?>
                  </div>
                  <div class="project-related-work__meta">
                    <span class="project-related-work__project-title description"><?php echo get_the_title($next_post->ID); ?></span>
                    <?php if ($next_type_label) : ?>
                      <span class="project-related-work__type description"><?php echo $next_type_label; ?></span>
                    <?php endif; ?>
                  </div>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php endif; ?>
