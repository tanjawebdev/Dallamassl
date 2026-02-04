<?php
/**
 * Layout: Blog Slider
 * Displays related blog posts in a slideable carousel
 */

global $post;
$current_post_id = $post->ID;

// Query recent posts, excluding the current post
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 9, // Show 9 posts (3 slides with 3 posts each)
  'post_status' => 'publish',
  'post__not_in' => array($current_post_id),
  'orderby' => 'date',
  'order' => 'DESC',
);

$blog_query = new WP_Query($args);
?>

<?php if ($blog_query->have_posts()) : ?>
  <section class="section blog-slider-section">
    <div class="container-fluid">
      <h2 class="blog-slider-section__title h1">Das könnte Sie noch interessieren</h2>
      
      <div class="blog-slider splide">
        <div class="splide__track">
          <ul class="splide__list">
            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
              <li class="splide__slide">
                <article <?php post_class('blog-teaser'); ?>>
                  <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="blog-teaser__image">
                      <?php the_post_thumbnail('large'); ?>
                    </a>
                  <?php endif; ?>

                  <div class="blog-teaser__body">
                    <h3 class="blog-teaser__title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <a href="<?php the_permalink(); ?>" class="blog-teaser__link btn btn-overview">
                      <span>Mehr erfahren</span>
                    </a>
                  </div>
                </article>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
