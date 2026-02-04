<?php
/**
 * Sticky D Component
 * ACF flexible content layout
 */

$logo_animation = get_sub_field('logo_animation'); // ACF field - can be true/false or other type
?>

<div class="sticky-d">
    <div class="sticky-d-logo container-lg">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php
                $svg_path = get_template_directory() . '/static/img/d.svg';
                if (file_exists($svg_path)) {
                echo file_get_contents($svg_path);
                }
            ?>
        </a>
    </div>
    <div class="sticky-d-text">
        <h1>
            INTERIOR <br>
            DESIGN + <br>
            INNENARCHITEKTUR
        </h1>
    </div>
</div>