<?php

// Register Navigation Menu
function my_custom_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'my-custom-theme'),
    ));
}
add_action('after_setup_theme', 'my_custom_menus');


add_theme_support('title-tag'); // Enables dynamic title
add_theme_support('post-thumbnails'); // Enables featured images
add_theme_support('custom-logo');


// link css and Javascript file

function custom_theme_enqueue_scripts() {
    // Bootstrap CSS
    

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');

    // Theme Default Style
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Custom CSS
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom-style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('contact-css', get_template_directory_uri() . '/assets/css/contact-form.css', array(), '1.0.0', 'all');

    // Bootstrap JS (Optional)
    
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_scripts');




// Register Sidebar Widget Area

function my_theme_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'my-custom-theme'),
        'id' => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');



function create_contact_form_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        rating INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}


create_contact_form_table();




?> 