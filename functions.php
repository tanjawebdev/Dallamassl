<?php

// CPT TAXONOMY

include( 'configure/cpt-taxonomy.php' );

// Utilities

include( 'configure/utilities.php' );

// CONFIG

include( 'configure/configure.php' );

// JAVASCRIPT & CSS

include( 'configure/js-css.php' );

// SHORTCODES

include( 'configure/shortcodes.php' );

// ACF

include( 'configure/acf.php' );

// HOOKS ADMIN

if(is_admin()) {
	include( 'configure/admin.php' );
}

// Highlight menu items on CPT archive pages
// WordPress doesn't auto-detect page menu items pointing to CPT archives
add_filter('nav_menu_css_class', function($classes, $item) {
    if (is_post_type_archive('project')) {
        $archive_link = get_post_type_archive_link('project');
        if ($archive_link && trailingslashit($item->url) === trailingslashit($archive_link)) {
            $classes[] = 'current-menu-item';
        }
    }
    return $classes;
}, 10, 2);
