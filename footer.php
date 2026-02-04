
  </div><!-- #content -->

  <footer id="colophon" class="site-footer">
    <div class="footer-content container-fluid">
      <div class="footer-left col-12 col-md-4 col-lg-6">
        <div class="footer-logo">
          <img src="<?php echo get_template_directory_uri(); ?>/static/img/logo.svg" alt="Logo">
        </div>
      </div>
      <div class="footer-right col-12 col-md-8 col-lg-6">
        <div class="footer-menu col-lg-12">
          <?php
          // Get the footer menu
          $menu_name = 'menu-footer';
          $locations = get_nav_menu_locations();
          $menu = wp_get_nav_menu_object($locations[$menu_name]);
          $menu_items = wp_get_nav_menu_items($menu->term_id);
          
          // Organize menu items by parent
          $menu_tree = array();
          foreach ($menu_items as $item) {
            if ($item->menu_item_parent == 0) {
              $menu_tree[$item->ID] = array(
                'item' => $item,
                'children' => array()
              );
            }
          }
          foreach ($menu_items as $item) {
            if ($item->menu_item_parent != 0) {
              if (isset($menu_tree[$item->menu_item_parent])) {
                $menu_tree[$item->menu_item_parent]['children'][] = $item;
              }
            }
          }
          ?>
          
          <!-- Desktop Menu (visible on md+) -->
          <ul id="menu-footer" class="d-none d-md-flex">
            <?php foreach ($menu_tree as $parent_id => $branch): ?>
              <li>
                <a href="<?php echo esc_url($branch['item']->url); ?>" class="<?php echo esc_attr(implode(' ', (array)$branch['item']->classes)); ?>"><?php echo esc_html($branch['item']->title); ?></a>
                <?php if (!empty($branch['children'])): ?>
                  <ul class="sub-menu">
                    <?php foreach ($branch['children'] as $child): ?>
                      <li><a href="<?php echo esc_url($child->url); ?>" class="<?php echo esc_attr(implode(' ', (array)$child->classes)); ?>"><?php echo esc_html($child->title); ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
          
          <!-- Mobile Accordion (visible below md) -->
          <div class="footer-accordion d-md-none accordion" id="footerAccordion">
            <?php $index = 0; foreach ($menu_tree as $parent_id => $branch): ?>
              <div class="accordion-item">
                <button class="accordion-button <?php echo $index > 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#footerCollapse<?php echo $index; ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                  <h3><?php echo esc_html($branch['item']->title); ?></h3>
                </button>
                <div id="footerCollapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" data-bs-parent="#footerAccordion">
                  <div class="accordion-body">
                    <?php if (!empty($branch['children'])): ?>
                      <ul>
                        <?php foreach ($branch['children'] as $child): ?>
                          <li><a href="<?php echo esc_url($child->url); ?>" class="<?php echo esc_attr(implode(' ', (array)$child->classes)); ?>"><?php echo esc_html($child->title); ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php $index++; endforeach; ?>
          </div>
        </div>
        <div class="footer-legal col-lg-12">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-legal', 'menu_id' => 'menu-legal' ) ); ?>
          <div class="footer-text">
            <p> &copy; Alwera AG 2025</p>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
