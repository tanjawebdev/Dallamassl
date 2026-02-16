<?php
/**
 * Template: Project Archive
 * Custom archive page for /projects/ with ACF support
 */

get_header(); 

// Get the archive page ID - WordPress doesn't have a built-in "archive page" like it does for posts,
// so we'll need to use ACF options or create a way to attach fields to the archive
?>

<main id="main" class="site-main">
  
  <?php
  // Option 1: Check if there's an ACF Options page for project archive
  if (function_exists('have_rows') && have_rows('page_modules', 'option')) {
    get_template_part('templates/render', 'page-modules');
  } 
  // Option 2: You can also create a regular page and pull its ACF content here
  else {
    // Get the page titled "Projects" to use its ACF content
    $projects_page = get_page_by_path('projects');
    
    if ($projects_page && function_exists('have_rows') && have_rows('page_modules', $projects_page->ID)) {
      global $post;
      $old_post = $post;
      $post = $projects_page;
      setup_postdata($post);
      
      get_template_part('templates/render', 'page-modules');
      
      $post = $old_post;
      if ($post) {
        setup_postdata($post);
      }
    } else {
      // Fallback: Simple project listing
      ?>
      <section class="section">
        <div class="container-lg">
          <h1>Projects</h1>
          
          <?php if (have_posts()) : ?>
            <div class="row">
              <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4">
                  <article>
                    <a href="<?php the_permalink(); ?>">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                      <?php endif; ?>
                      <h2><?php the_title(); ?></h2>
                    </a>
                  </article>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>
      <?php
    }
  }
  ?>

</main>

<?php get_footer(); ?>
