<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="stylesheet" href="https://use.typekit.net/bmn7vrc.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

  <header id="masthead">
    <div id="logo">
      <?php
      if ( is_front_page() || is_home() ) : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
             <?php get_template_part('partials/logo-static'); ?>
          </a>
      <?php else : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
             <?php get_template_part('partials/logo'); ?>
          </a>
      <?php
      endif;
      ?>
    </div>
  </header>

  <?php
  // Check if we're on the home page
  $is_home = is_front_page() || is_home();
  ?>

  <div class="navigation" data-is-home="<?php echo $is_home ? 'true' : 'false'; ?>">
    <nav id="site-navigation" class="main-navigation">
      <div class="nav-label description">MENU</div>
      
      <?php 
      wp_nav_menu( array( 
        'theme_location' => 'menu-main',
        'menu_id' => 'menu-main',
        'menu_class' => 'nav-menu',
        'container' => false,
      ) ); 
      ?>
    </nav>

    <?php
    // Get menu items and output submenu panels separately
    $menu_name = 'menu-main';
    $locations = get_nav_menu_locations();
    
    if (isset($locations[$menu_name])) {
      $menu = wp_get_nav_menu_object($locations[$menu_name]);
      
      if ($menu) {
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        
        // Group items by parent
        $menu_tree = array();
        foreach ($menu_items as $item) {
          if ($item->menu_item_parent == 0) {
            if (!isset($menu_tree[$item->ID])) {
              $menu_tree[$item->ID] = array();
            }
          } else {
            $menu_tree[$item->menu_item_parent][] = $item;
          }
        }
        
        // Output submenu panels for each parent that has children
        foreach ($menu_tree as $parent_id => $children) {
          if (!empty($children)) {
            echo '<div class="submenu-panel" data-parent-id="' . esc_attr($parent_id) . '">';
            echo '<ul class="submenu">';
            foreach ($children as $child) {
              $current_class = '';
              if (in_array('current-menu-item', $child->classes)) {
                $current_class = ' class="current-menu-item"';
              }
              echo '<li' . $current_class . '>';
              echo '<a href="' . esc_url($child->url) . '">' . esc_html($child->title) . '</a>';
              echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
          }
        }
      }
    }
    ?>

    <button class="menu-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="<?php esc_attr_e( 'Menü öffnen', 'dallamassl' ); ?>">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
      <div class="mobile-menu__wrapper">
        <div class="mobile-menu__inner">
          <nav class="mobile-menu__nav">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'menu-main',
                  'menu_id'        => 'mobile-menu-main',
                  'menu_class'     => 'mobile-menu__list',
                )
              );
            ?>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div id="content" class="site-content">
