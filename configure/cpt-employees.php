<?php
/**
 * Custom Post Type: Employees
 * Central employee management with department taxonomy
 */

// Register Custom Post Type
add_action('init', 'projecttheme_register_employees');

function projecttheme_register_employees() {
    
    $labels = array(
        'name'                  => _x('Mitarbeiter', 'Post type general name', 'alwera'),
        'singular_name'         => _x('Mitarbeiter', 'Post type singular name', 'alwera'),
        'menu_name'             => _x('Mitarbeiter', 'Admin Menu text', 'alwera'),
        'name_admin_bar'        => _x('Mitarbeiter', 'Add New on Toolbar', 'alwera'),
        'add_new'               => __('Neu hinzufügen', 'alwera'),
        'add_new_item'          => __('Neuen Mitarbeiter hinzufügen', 'alwera'),
        'new_item'              => __('Neuer Mitarbeiter', 'alwera'),
        'edit_item'             => __('Mitarbeiter bearbeiten', 'alwera'),
        'view_item'             => __('Mitarbeiter ansehen', 'alwera'),
        'all_items'             => __('Alle Mitarbeiter', 'alwera'),
        'search_items'          => __('Mitarbeiter durchsuchen', 'alwera'),
        'not_found'             => __('Keine Mitarbeiter gefunden.', 'alwera'),
        'not_found_in_trash'    => __('Keine Mitarbeiter im Papierkorb gefunden.', 'alwera'),
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
        'name'              => _x('Abteilungen', 'taxonomy general name', 'alwera'),
        'singular_name'     => _x('Abteilung', 'taxonomy singular name', 'alwera'),
        'search_items'      => __('Abteilungen durchsuchen', 'alwera'),
        'all_items'         => __('Alle Abteilungen', 'alwera'),
        'parent_item'       => __('Übergeordnete Abteilung', 'alwera'),
        'parent_item_colon' => __('Übergeordnete Abteilung:', 'alwera'),
        'edit_item'         => __('Abteilung bearbeiten', 'alwera'),
        'update_item'       => __('Abteilung aktualisieren', 'alwera'),
        'add_new_item'      => __('Neue Abteilung hinzufügen', 'alwera'),
        'new_item_name'     => __('Name der neuen Abteilung', 'alwera'),
        'menu_name'         => __('Abteilungen', 'alwera'),
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
