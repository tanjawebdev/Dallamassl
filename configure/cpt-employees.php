<?php
/**
 * Custom Post Type: Employees
 * Central employee management with department taxonomy
 */

// Register Custom Post Type
add_action('init', 'projecttheme_register_employees');

function projecttheme_register_employees() {
    
    $labels = array(
        'name'                  => _x('Mitarbeiter', 'Post type general name', 'dallamassl'),
        'singular_name'         => _x('Mitarbeiter', 'Post type singular name', 'dallamassl'),
        'menu_name'             => _x('Mitarbeiter', 'Admin Menu text', 'dallamassl'),
        'name_admin_bar'        => _x('Mitarbeiter', 'Add New on Toolbar', 'dallamassl'),
        'add_new'               => __('Neu hinzufügen', 'dallamassl'),
        'add_new_item'          => __('Neuen Mitarbeiter hinzufügen', 'dallamassl'),
        'new_item'              => __('Neuer Mitarbeiter', 'dallamassl'),
        'edit_item'             => __('Mitarbeiter bearbeiten', 'dallamassl'),
        'view_item'             => __('Mitarbeiter ansehen', 'dallamassl'),
        'all_items'             => __('Alle Mitarbeiter', 'dallamassl'),
        'search_items'          => __('Mitarbeiter durchsuchen', 'dallamassl'),
        'not_found'             => __('Keine Mitarbeiter gefunden.', 'dallamassl'),
        'not_found_in_trash'    => __('Keine Mitarbeiter im Papierkorb gefunden.', 'dallamassl'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,                     // Not visible in frontend (no single pages)
        'publicly_queryable' => false,                     // No public queries
        'show_ui'            => true,                      // Show in admin
        'show_in_menu'       => true,                      // Show in admin menu
        'menu_position'      => 20,                        // Position in admin sidebar
        'menu_icon'          => 'dashicons-groups',        // Icon (people/groups)
        'supports'           => array('title', 'thumbnail', 'page-attributes'), // Title = Name, Thumbnail = Photo
        'has_archive'        => false,                     // No archive page needed
        'show_in_rest'       => true,                      // Enable Gutenberg + REST API
        'capability_type'    => 'post',
    );

    register_post_type('employee', $args);
}

// Register Custom Taxonomy: Department
add_action('init', 'projecttheme_register_department_taxonomy');

function projecttheme_register_department_taxonomy() {
    
    $labels = array(
        'name'              => _x('Abteilungen', 'taxonomy general name', 'dallamassl'),
        'singular_name'     => _x('Abteilung', 'taxonomy singular name', 'dallamassl'),
        'search_items'      => __('Abteilungen durchsuchen', 'dallamassl'),
        'all_items'         => __('Alle Abteilungen', 'dallamassl'),
        'parent_item'       => __('Übergeordnete Abteilung', 'dallamassl'),
        'parent_item_colon' => __('Übergeordnete Abteilung:', 'dallamassl'),
        'edit_item'         => __('Abteilung bearbeiten', 'dallamassl'),
        'update_item'       => __('Abteilung aktualisieren', 'dallamassl'),
        'add_new_item'      => __('Neue Abteilung hinzufügen', 'dallamassl'),
        'new_item_name'     => __('Name der neuen Abteilung', 'dallamassl'),
        'menu_name'         => __('Abteilungen', 'dallamassl'),
    );

    $args = array(
        'hierarchical'      => true,                       // Like categories (can have parent/child)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,                       // Show in post list
        'query_var'         => true,
        'rewrite'           => array('slug' => 'department'),
        'show_in_rest'      => true,
    );

    register_taxonomy('department', array('employee'), $args);
}
