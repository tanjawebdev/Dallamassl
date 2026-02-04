<?php
// 1. Get ALL Department Terms (Taxonomy: 'department')
$departments = get_terms(array(
  'taxonomy' => 'department',
  'hide_empty' => false,
  'meta_key' => 'department_order',  // or 'reihenfolge' depending on field name
  'orderby' => 'meta_value_num',
  'order' => 'ASC'
));
?>

<?php if (!empty($departments) && !is_wp_error($departments)): ?>
  <div class="accordion" id="accordionContacts">

    <?php foreach ($departments as $dept_index => $department):

      // Get the department name and ID
      $department_name = esc_html($department->name);
      $department_id = $department->term_id;

      // 2. Query Employees for the Current Department
      $args = array(
        'post_type' => 'employee', // Confirmed Post Type Slug
        'posts_per_page' => -1,
        'orderby'        => array(
          'menu_order' => 'ASC',
          'title'      => 'ASC', // Fallback bei gleicher Reihenfolge
        ),
        'tax_query' => array(
          array(
            'taxonomy' => 'department',
            'field' => 'term_id', // Use the term ID for reliable filtering
            'terms' => $department_id,
          ),
        ),
      );

      $employees = new WP_Query($args);
      ?>
      <div class="accordion-item">
        <div class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseDept<?php echo $dept_index; ?>" aria-expanded="false">
            <h3><?php echo $department_name; ?></h3>
          </button>
        </div>
        <div id="collapseDept<?php echo $dept_index; ?>" class="accordion-collapse collapse"
          data-bs-parent="#accordionContacts">
          <div class="accordion-body">

            <?php if ($employees->have_posts()): ?>
              <?php while ($employees->have_posts()):
                $employees->the_post(); ?>

                <div class="accordion-contact-card">
                  <?php if (has_post_thumbnail()): ?>
                    <div class="contact-image-wrapper">
                      <picture>
                        <?php the_post_thumbnail('medium', ['class' => 'contact-image']); ?>
                      </picture>
                    </div>
                  <?php endif; ?>
                  <div class="accordion-contact-card-body">
                    <?php $departments = get_the_terms(get_the_ID(), 'department'); ?>

                    <?php if ($departments && !is_wp_error($departments)): ?>
                      <?php $department = reset($departments); ?>
                      <p class="job-title">
                        <?php echo esc_html($department->name); ?>
                      </p>
                    <?php endif; ?>

                    <?php if (get_the_title()): ?>
                      <h4><?php the_title(); ?></h4>
                    <?php endif; ?>

                    <?php if (get_field('telephone')): ?>
                      <p class="contact-element"><strong>Tel:</strong> <a
                          href="tel:<?php echo esc_attr(get_field('telephone')); ?>"><?php the_field('telephone'); ?></a>
                      </p>
                    <?php endif; ?>

                    <?php if (get_field('mobile')): ?>
                      <p class="contact-element"><strong>Mobil:</strong> <a
                          href="tel:<?php echo esc_attr(get_field('mobile')); ?>"><?php the_field('mobile'); ?></a>
                      </p>
                    <?php endif; ?>

                    <?php if (get_field('mail')): ?>
                      <p class="contact-element"><strong>E-Mail:</strong> <a
                          href="mailto:<?php echo esc_attr(get_field('mail')); ?>"><?php the_field('mail'); ?></a>
                      </p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p>No employees found for the <?php echo $department_name; ?> department.</p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>