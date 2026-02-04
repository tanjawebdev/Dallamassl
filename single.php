<?php
/** Template: Single Post */
get_header(); ?>

<main id="main" class="site-main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php
    if (function_exists('have_rows') && have_rows('page_modules')) {
      get_template_part('templates/render', 'page-modules');
    } else {
      echo '<section class="section"><div class="container-lg">';
        the_title('<h1 class="mb-4">','</h1>');
        the_content();
      echo '</div></section>';
    }
    ?>

  <?php endwhile; endif; ?>

  <?php
  // Blog Slider - Related Posts
  get_template_part('template-parts/flex/layout', 'blog-slider');
  ?>
</main>

<?php get_footer(); ?>