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

  <header id="masthead" class="site-header row">
    <div class="site-branding col-6">
      <?php
      if ( is_front_page() || is_home() ) : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri(); ?>/static/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
          </a>
      <?php else : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri(); ?>/static/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
          </a>
      <?php
      endif;
      ?>
    </div><!-- .site-branding -->

    <div class="navigation col-6">
      <nav id="site-navigation" class="main-navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_id' => 'menu-main' ) ); ?>
      </nav><!-- #site-navigation -->

      <nav id="site-navigation-button" class="button-navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-button', 'menu_id' => 'menu-button' ) ); ?>
      </nav><!-- #site-navigation -->
    </div>

    <button class="menu-toggle col-6" aria-expanded="false" aria-controls="mobile-menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </header><!-- #masthead -->

  <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <div class="mobile-menu__inner">
      <div class="mobile-menu__header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="mobile-menu__brand">
          <img src="<?php echo get_template_directory_uri(); ?>/static/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
        </a>
        <button class="menu-toggle menu-toggle--close" aria-label="<?php esc_attr_e( 'Menü schließen', 'dallamassl' ); ?>">
          <span></span>
          <span></span>
        </button>
      </div>
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
      <div class="mobile-menu__buttons">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-button',
              'menu_id'        => 'mobile-menu-button',
              'menu_class'     => 'mobile-menu__button-list',
            )
          );
        ?>
      </div>
    </div>
  </div>

  <div id="content" class="site-content">
