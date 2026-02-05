<?php
/**
 * Layout: Project Related Work
 * Displays previous and next projects with featured images and project types
 */

global $post;

// Get previous and next projects
$prev_post = get_previous_post(false, '', 'project_type');
$next_post = get_next_post(false, '', 'project_type');

// Only display if we have at least one related project
if ($prev_post || $next_post) :
?>

<section class="section project-related-work">
  <div class="container-fluid">
    <h2 class="project-related-work__title">RELATED WORK</h2>
    
    <div class="project-related-work__content">
      
      <!-- Previous Project -->
      <div class="project-related-work__item <?php echo !$prev_post ? 'project-related-work__item--empty' : ''; ?>">
        <?php if ($prev_post) : 
          $prev_thumbnail = get_the_post_thumbnail_url($prev_post->ID, 'large');
          $prev_types = get_the_terms($prev_post->ID, 'project_type');
          $prev_type_label = $prev_types && !is_wp_error($prev_types) ? esc_html($prev_types[0]->name) : '';
        ?>
          <a href="<?php echo get_permalink($prev_post->ID); ?>" class="project-related-work__link">
            <div class="project-related-work__image <?php echo !$prev_thumbnail ? 'project-related-work__image--placeholder' : ''; ?>" 
                 <?php if ($prev_thumbnail) : ?>
                 style="background-image: url('<?php echo esc_url($prev_thumbnail); ?>');"
                 <?php endif; ?>>
            </div>
            <div class="project-related-work__meta">
              <h3 class="project-related-work__project-title"><?php echo get_the_title($prev_post->ID); ?></h3>
              <?php if ($prev_type_label) : ?>
                <span class="project-related-work__type"><?php echo $prev_type_label; ?></span>
              <?php endif; ?>
            </div>
          </a>
        <?php endif; ?>
      </div>

      <!-- Center Tagline -->
      <div class="project-related-work__tagline">
        <p>THE<br>ESSENCE<br>OF ROOMS</p>
      </div>

      <!-- Next Project -->
      <div class="project-related-work__item <?php echo !$next_post ? 'project-related-work__item--empty' : ''; ?>">
        <?php if ($next_post) : 
          $next_thumbnail = get_the_post_thumbnail_url($next_post->ID, 'large');
          $next_types = get_the_terms($next_post->ID, 'project_type');
          $next_type_label = $next_types && !is_wp_error($next_types) ? esc_html($next_types[0]->name) : '';
        ?>
          <a href="<?php echo get_permalink($next_post->ID); ?>" class="project-related-work__link">
            <div class="project-related-work__image <?php echo !$next_thumbnail ? 'project-related-work__image--placeholder' : ''; ?>" 
                 <?php if ($next_thumbnail) : ?>
                 style="background-image: url('<?php echo esc_url($next_thumbnail); ?>');"
                 <?php endif; ?>>
            </div>
            <div class="project-related-work__meta">
              <h3 class="project-related-work__project-title"><?php echo get_the_title($next_post->ID); ?></h3>
              <?php if ($next_type_label) : ?>
                <span class="project-related-work__type"><?php echo $next_type_label; ?></span>
              <?php endif; ?>
            </div>
          </a>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<?php endif; ?>
