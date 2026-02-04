<?php
/** Template: Blog Overview (Posts page) */
get_header(); ?>

<main id="main" class="site-main">
  <?php
  $posts_page_id = get_option('page_for_posts');

  // ACF Flexible Content
  if ($posts_page_id && function_exists('have_rows') && have_rows('page_modules', $posts_page_id)) {
    global $post;
    $old_post = $post;
    $post = get_post($posts_page_id);
    setup_postdata($post);
    get_template_part('templates/render', 'page-modules');
    $post = $old_post;
    if ($post) {
      setup_postdata($post);
    }
  } else {
    if ($posts_page_id) {
      echo '<section class="section"><div class="container-lg">';
        echo '<h1 class="mb-4">' . get_the_title($posts_page_id) . '</h1>';
      echo '</div></section>';
    }
  }
  ?>

<?php if (have_posts()) : ?>
  <section class="section section--blog-overview">
    <div class="container-lg">
      <div class="blog-grid row">
        <?php while (have_posts()) : the_post(); ?>

          <article <?php post_class('blog-teaser col-lg-4'); ?>>
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>" class="blog-teaser__image">
                <?php the_post_thumbnail('large'); ?>
              </a>
            <?php endif; ?>

            <div class="blog-teaser__body">
              <?php
              // ACF subtitle
              $subtitle = function_exists('get_field') ? get_field('overview_subtitle') : '';
              if ($subtitle) : ?>
                <p class="blog-teaser__subtitle">
                  <?php echo esc_html($subtitle); ?>
                </p>
              <?php endif; ?>

              <h2 class="blog-teaser__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>

              
              <?php
                $summary = function_exists('get_field') ? get_field('overview_summary') : '';
                if ($summary) : ?>
                <div class="blog-teaser__excerpt">
                  <a href="<?php the_permalink(); ?>">
                    <?php echo esc_html($summary); ?>
                  </a>
                </div>
              <?php endif; ?>

              <a href="<?php the_permalink(); ?>" class="blog-teaser__link btn btn-overview">
                <span>Mehr erfahren</span>
              </a>
            </div>
          </article>

        <?php endwhile; ?>
      </div>

      <?php 
      the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => '<span aria-label="' . __('Previous', 'dallamassl') . '"></span>',
        'next_text' => '<span aria-label="' . __('Next', 'dallamassl') . '"></span>',
        'screen_reader_text' => 'Pagination Blog Posts',
      )); 
      ?>
    </div>
  </section>
<?php endif; ?>
</main>

<?php get_footer(); ?>