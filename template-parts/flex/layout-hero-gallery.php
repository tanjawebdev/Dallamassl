<?php
$items = get_sub_field('items');
$interval = get_sub_field('interval') ?: 3000;
?>
<?php if ($items): ?>
  <div class="hero-gallery typo-white splide" data-interval="<?php echo esc_attr($interval); ?>">
    <div class="splide__track">
      <ul class="splide__list">
        <?php foreach ($items as $item): ?>
          <li class="splide__slide">
            <div class="hero-gallery-item">
              <div class="hero-gallery-content">
                <div class="hero-gallery-text col-lg-4">
                  <?php if ($item['subtitle']): ?>
                    <p class="subtitle"><?php echo esc_html($item['subtitle']); ?></p>
                  <?php endif; ?>
                  
                  <?php if ($item['title']): 
                    $title_tag = $item['title_tag'] ?: 'h2';
                    $title_tag = in_array($title_tag, ['h1', 'h2', 'h3']) ? $title_tag : 'h2';
                  ?>
                    <<?php echo tag_escape($title_tag); ?>><?php echo esc_html($item['title']); ?></<?php echo tag_escape($title_tag); ?>>
                  <?php endif; ?>
                  
                  <?php if ($item['text']): ?>
                    <p class="description"><?php echo wp_kses_post($item['text']); ?></p>
                  <?php endif; ?>
                </div>

                <?php if ($item['buttontext'] && $item['buttonlink']): ?>
                  <a href="<?php echo esc_url($item['buttonlink']); ?>" class="btn btn-hero">
                    <span><?php echo esc_html($item['buttontext']); ?></span>
                  </a>
                <?php endif; ?>
                
              </div>

              <div class="hero-media">
                <?php if ($item['image']): ?>
                  <picture class="hero-picture">
                    <?php echo wp_get_attachment_image($item['image']['ID'], 'large', false, ['class' => 'img-fluid']); ?>
                  </picture>
                <?php endif; ?>

                <?php if ($item['video']): ?>
                  <video autoplay loop muted playsinline>
                    <source src="<?php echo esc_url($item['video']['url']); ?>" type="<?php echo esc_attr($item['video']['mime_type']); ?>">
                    Your browser does not support the video tag.
                  </video>
                <?php endif; ?>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>