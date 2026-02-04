<?php
$blog_posts = get_sub_field('blog_posts');
$interval = get_sub_field('interval') ?: 3000;
?>

<?php if ($blog_posts): ?>
  <div class="hero-gallery typo-white splide" data-interval="<?php echo esc_attr($interval); ?>">
    <div class="splide__track">
      <ul class="splide__list">
        <?php foreach ($blog_posts as $post_url):
          // Convert URL to post ID
          $post_id = url_to_postid($post_url);
          ?>
          <li class="splide__slide">
            <div class="hero-gallery-item">
              <div class="hero-gallery-content">
                <div class="hero-gallery-text col-lg-4">
                  <h2><?php echo get_the_title($post_id); ?></h2>
                </div>

                <a href="<?php echo esc_url($post_url); ?>" class="btn btn-hero">
                  <span>Beitrag lesen</span>
                </a>
              </div>

              <div class="hero-media">
                <?php if ($video_url): ?>
                  <video autoplay loop muted playsinline class="hero-video">
                    <source src="<?php echo $video_url; ?>" type="<?php echo $video_mime; ?>">
                    Your browser does not support the video tag.
                  </video>

                <?php elseif (has_post_thumbnail($post_id)): ?>
                  <picture class="hero-picture">
                    <?php echo get_the_post_thumbnail($post_id, 'large', ['class' => 'img-fluid']); ?>
                  </picture>
                <?php endif; ?>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>