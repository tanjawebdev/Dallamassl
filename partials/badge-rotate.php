<?php
/**
 * Rotating Badge – "GET IN TOUCH"
 * Fixed bottom-right corner, CSS-only rotation.
 * Included only on the front page (see page.php).
 */
?>

<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="badge-rotate" aria-label="Get in touch">
  <?php
    $svg_path = get_template_directory() . '/static/img/get-in-touch.svg';
    if ( file_exists( $svg_path ) ) {
      echo file_get_contents( $svg_path );
    }
  ?>
</a>