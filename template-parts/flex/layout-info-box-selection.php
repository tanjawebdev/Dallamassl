<?php
$categories = get_sub_field('categories');
?>

<?php if ($categories): ?>
  <div class="info-box-selection">
    <!-- Category Buttons -->
    <div class="info-box-buttons">
      <?php foreach ($categories as $index => $category): ?>
        <?php if ($category['title']): ?>
          <button 
            class="info-box-btn btn btn-primary <?php echo $index === 0 ? 'active' : ''; ?>" 
            data-category="<?php echo $index; ?>">
            <?php echo esc_html($category['title']); ?>
          </button>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <!-- Category Content Panels -->
    <?php foreach ($categories as $index => $category): ?>
      <div 
        class="info-box-panel <?php echo $index === 0 ? 'active' : ''; ?>" 
        data-category="<?php echo $index; ?>">
        
        <?php if ($category['text']): ?>
          <div class="info-box-text col-12 col-lg-8 col-xl-6">
            <?php echo wp_kses_post($category['text']); ?>
          </div>
        <?php endif; ?>
        
        <?php if ($category['images']): ?>
          <div class="info-box-images row">
            <?php foreach ($category['images'] as $img): ?>
              <div class="info-box-image col-6 col-sm-4">
                <picture>
                  <?php echo wp_get_attachment_image($img['ID'], 'medium', false, ['class' => 'img-fluid rounded']); ?>
                </picture>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

