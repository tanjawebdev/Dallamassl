<?php
$title = get_sub_field('title');
$cards = get_sub_field('card');
?>

<?php if ($title): ?>
  <h2 class="category-cards-h2"><?php echo esc_html($title); ?></h2>
<?php endif; ?>

<?php if ($cards): ?>
  <div class=" row g-2">

    <?php foreach ($cards as $card): ?>
      <div class="col-md-3">

        <a href="<?php echo esc_url($card['pagelink']); ?>"
          class="card d-block overflow-hidden position-relative text-decoration-none">

          <?php if (!empty($card['icon'])): ?>
            <img src="<?php echo esc_url($card['icon']); ?>" alt=""
              class="card-icon position-absolute top-50 start-50 translate-middle" />
          <?php endif; ?>

          <?php if (!empty($card['image'])): ?>
            <?php echo wp_get_attachment_image(
              $card['image']['ID'],
              'medium',
              false,
              ['class' => 'card-img-top']
            ); ?>
          <?php endif; ?>

          <?php if (!empty($card['text'])): ?>
            <div class="card-body position-absolute bottom-0 start-0 w-100 text-white">
              <h3 class="card-text d-inline-block"><?php echo esc_html($card['text']); ?></h3>
              <i class="bi bi-arrow-right"></i>
            </div>
          <?php endif; ?>

        </a>

      </div>
    <?php endforeach; ?>

  </div>
<?php endif; ?>