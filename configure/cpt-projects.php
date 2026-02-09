<?php
/**
 * Custom Post Type: Projects
 * Central project management with department taxonomy
 */

// Register Custom Post Type
add_action('init', 'projecttheme_register_projects');

function projecttheme_register_projects() {
    
    $labels = array(
        'name'                  => _x('Projekte', 'Post type general name', 'dallamassl'),
        'singular_name'         => _x('Projekt', 'Post type singular name', 'dallamassl'),
        'menu_name'             => _x('Projekte', 'Admin Menu text', 'dallamassl'),
        'name_admin_bar'        => _x('Projekt', 'Add New on Toolbar', 'dallamassl'),
        'add_new'               => __('Neu hinzufügen', 'dallamassl'),
        'add_new_item'          => __('Neues Projekt hinzufügen', 'dallamassl'),
        'new_item'              => __('Neues Projekt', 'dallamassl'),
        'edit_item'             => __('Projekt bearbeiten', 'dallamassl'),
        'view_item'             => __('Projekt ansehen', 'dallamassl'),
        'all_items'             => __('Alle Projekte', 'dallamassl'),
        'search_items'          => __('Projekte durchsuchen', 'dallamassl'),
        'not_found'             => __('Keine Projekte gefunden.', 'dallamassl'),
        'not_found_in_trash'    => __('Keine Projekte im Papierkorb gefunden.', 'dallamassl'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,                      // Visible in frontend with single pages
        'publicly_queryable' => true,                      // Allow public queries
        'show_ui'            => true,                      // Show in admin
        'show_in_menu'       => true,                      // Show in admin menu
        'menu_position'      => 20,                        // Position in admin sidebar
        'menu_icon'          => 'dashicons-portfolio',     // Icon (portfolio/projects)
        'supports'           => array('title', 'thumbnail', 'page-attributes'), // Add editor support
        'has_archive'        => true,                      // Enable archive page
        'rewrite'            => array(
            'slug'       => 'projects',                    // Use /projects/ as base URL
            'with_front' => false                          // Don't prepend front base
        ),
        'show_in_rest'       => true,                      // Enable Gutenberg + REST API
        'capability_type'    => 'post',
    );

    register_post_type('project', $args);
}

// Register Custom Taxonomy: Services
add_action('init', 'projecttheme_register_services_taxonomy');

function projecttheme_register_services_taxonomy() {
    
    $labels = array(
        'name'              => _x('Services', 'taxonomy general name', 'dallamassl'),
        'singular_name'     => _x('Service', 'taxonomy singular name', 'dallamassl'),
        'search_items'      => __('Services durchsuchen', 'dallamassl'),
        'all_items'         => __('Alle Services', 'dallamassl'),
        'parent_item'       => __('Übergeordneter Service', 'dallamassl'),
        'parent_item_colon' => __('Übergeordneter Service:', 'dallamassl'),
        'edit_item'         => __('Service bearbeiten', 'dallamassl'),
        'update_item'       => __('Service aktualisieren', 'dallamassl'),
        'add_new_item'      => __('Neuen Service hinzufügen', 'dallamassl'),
        'new_item_name'     => __('Name des neuen Services', 'dallamassl'),
        'menu_name'         => __('Services', 'dallamassl'),
    );

    $args = array(
        'hierarchical'      => true,                       // Like categories (can have parent/child)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,                       // Show in post list
        'query_var'         => false,                      // Disable URL query parameter
        'rewrite'           => false,                      // Disable pretty URLs
        'show_in_rest'      => true,
    );

    register_taxonomy('service', array('project'), $args);
}

// Register Custom Taxonomy: Project Type (B2B/B2C)
add_action('init', 'projecttheme_register_project_type_taxonomy');

function projecttheme_register_project_type_taxonomy() {
    
    $labels = array(
        'name'              => _x('Project Types', 'taxonomy general name', 'dallamassl'),
        'singular_name'     => _x('Project Type', 'taxonomy singular name', 'dallamassl'),
        'search_items'      => __('Project Types durchsuchen', 'dallamassl'),
        'all_items'         => __('Alle Project Types', 'dallamassl'),
        'edit_item'         => __('Project Type bearbeiten', 'dallamassl'),
        'update_item'       => __('Project Type aktualisieren', 'dallamassl'),
        'add_new_item'      => __('Neuen Project Type hinzufügen', 'dallamassl'),
        'new_item_name'     => __('Name des neuen Project Types', 'dallamassl'),
        'menu_name'         => __('Project Types', 'dallamassl'),
    );

    $args = array(
        'hierarchical'      => true,                       // Like categories (checkbox style)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,                       // Show in post list
        'query_var'         => false,                      // Disable URL query parameter
        'rewrite'           => false,                      // Disable pretty URLs
        'show_in_rest'      => true,
            );

    register_taxonomy('project_type', array('project'), $args);
}


// Register Custom Taxonomy: Location (f.e. Vienna)
add_action('init', 'projecttheme_register_location_taxonomy');

function projecttheme_register_location_taxonomy() {
    
    $labels = array(
        'name'              => _x('Locations', 'taxonomy general name', 'dallamassl'),
        'singular_name'     => _x('Location', 'taxonomy singular name', 'dallamassl'),
        'search_items'      => __('Locations durchsuchen', 'dallamassl'),
        'all_items'         => __('Alle Locations', 'dallamassl'),
        'edit_item'         => __('Location bearbeiten', 'dallamassl'),
        'update_item'       => __('Location aktualisieren', 'dallamassl'),
        'add_new_item'      => __('Neue Location hinzufügen', 'dallamassl'),
        'new_item_name'     => __('Name der neuen Location', 'dallamassl'),
        'menu_name'         => __('Locations', 'dallamassl'),
    );

    $args = array(
        'hierarchical'      => true,                       // Like categories (checkbox style)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,                       // Show in post list
        'query_var'         => false,                      // Disable URL query parameter
        'rewrite'           => false,                      // Disable pretty URLs
        'show_in_rest'      => true,
            );

    register_taxonomy('location', array('project'), $args);
}