<?php
$selected_departments = get_sub_field('department');
$title = get_sub_field('title');
?>

<?php if ($selected_departments): ?>
  <?php
  // Query employees from selected departments
  $args = array(
    'post_type' => 'employee',
    'posts_per_page' => -1,
    'orderby'        => array(
      'menu_order' => 'ASC',
      'title'      => 'ASC', // Fallback bei gleicher Reihenfolge
    ),
    'tax_query' => array(
      array(
        'taxonomy' => 'department',
        'field' => 'term_id',
        'terms' => $selected_departments,
      ),
    ),
  );

  $employees = new WP_Query($args);
  ?>

  <?php if ($employees->have_posts()): ?>
    <?php if ($title): ?>
      <h2 class="h1"><?php echo $title; ?></h2>
    <?php endif; ?>

    <div class="contact-card-wrapper row">
      <?php while ($employees->have_posts()):
        $employees->the_post(); ?>
        <div class="contact-card-employee col-sm-4 col-lg-3">
          <?php if (has_post_thumbnail()): ?>
            <picture class="contact-card-img">
              <?php the_post_thumbnail('medium', ['class' => 'contact-card-img-top']); ?>
            </picture>
          <?php endif; ?>

          <div class="contact-card-body">
            <?php $departments = get_the_terms(get_the_ID(), 'department'); ?>
            <?php if ($departments): ?>
              <div class="contact-card-departments">
                <?php foreach ($departments as $department): ?>
                  <span class="contact-card-department"><?php echo $department->name; ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <h3 class="contact-card-name"><?php the_title(); ?></h3>

            <div class="contact-card-info">
              <?php if (get_field('telephone')): ?>
                <p>
                  <a href="tel:<?php echo esc_attr(get_field('telephone')); ?>">
                    <strong>Tel:</strong> <?php the_field('telephone'); ?>
                  </a>
                </p>
              <?php endif; ?>

              <?php if (get_field('mobile')): ?>
                <p>
                  <a href="tel:<?php echo esc_attr(get_field('mobile')); ?>">
                    <strong>Mobil:</strong> <?php the_field('mobile'); ?>
                  </a>
                </p>
              <?php endif; ?>

              <?php if (get_field('mail')): ?>
                <p>
                  <a href="mailto:<?php echo esc_attr(get_field('mail')); ?>">
                    <strong>E-Mail:</strong> <?php the_field('mail'); ?>
                  </a>
                </p>
              <?php endif; ?>
            </div>

          </div>

        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  <?php endif; ?>

<?php endif; ?>