<?php
$images = get_sub_field('images');
?>
<?php if ($images): ?>
  <div class="body-images">

    <div class="d-flex flex-md-wrap horizontal-scroll-strip">

      <?php foreach ($images as $img): ?>
        <div class="body-image flex-shrink-0 col-md-6 w-75 w-sm-50 w-md-auto">
          <picture>
            <?php echo wp_get_attachment_image($img['ID'], 'medium', false, ['class' => 'img-fluid']); ?>
          </picture>
        </div>
      <?php endforeach; ?>

    </div>

  </div>
<?php endif; ?>