<?php
$big_picture = get_sub_field('big_picture');
$small_picture = get_sub_field('small_picture');
?>

<?php if ($big_picture): ?>
  <div class="body-images">
    <div class="image-strip">

      <div class="image">
        <picture>
          <?php echo wp_get_attachment_image($big_picture['ID'], 'medium', false, ['class' => 'img-fluid']); ?>
        </picture>
      </div>

      <div class="image">
        <picture>
          <?php echo wp_get_attachment_image($small_picture['ID'], 'medium', false, ['class' => 'img-fluid']); ?>
        </picture>
      </div>

    </div>

  </div>
<?php endif; ?>