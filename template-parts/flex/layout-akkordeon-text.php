<?php
$title = get_sub_field('title');
$items = get_sub_field('items');
?>

<div class="accordionText-wrapper">
  <?php if ($title): ?>
    <h2><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if ($items): ?>
    <div class="accordion" id="accordionText">
      <?php foreach ($items as $index => $item): ?>
        <div class="accordion-item">
          
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false">
              <h3><?php echo esc_html($item['subtitle']); ?></h3>
            </button>
          
          <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionText">
            <div class="accordion-body">
              <?php if ($item['text']): ?>
                <p><?php echo esc_html($item['text']); ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

