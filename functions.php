<?php

// Perform the basic theme setup
if (!function_exists('hackerminimal_setup')) {
    function hackerminimal_setup() {
        // Localization support
        load_theme_textdomain('hackerminimal', 
            get_template_directory() . '/langauges');

        // Automatically add feed links to the head
        add_theme_support('automatic-feed-links');
        
        // Let WordPress auto handle the title tag
        add_theme_support('title-tag');

        // Selective refresh of widgets
        add_theme_support('customize-selective-refresh-widgets');

        // Block styles
        add_theme_support('wp-block-styles');

        // Full-width and wide images
        add_theme_support('align-wide');

        // Responsive embeds
        add_theme_support('responsive-embeds');

        // Add HTML5 markup to WordPress areas
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets'
        ));

        // Register the navigation menus
        register_nav_menus(
            array(
                'primary'   => __('Primary Menu', 'hackerminimal'),
            )
        );
    }
}
add_action('after_setup_theme', 'hackerminimal_setup');

// Performs the widget initialization
function hackerminimal_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary', 'hackerminimal'),
        'id'            => 'primary-sidebar',
        'description'   => __('The primary sidebar for posts.', 'hackerminimal'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_titble'  => '</h2>',
    ));
}
add_action('widgets_init', 'hackerminimal_widgets_init');

// Handle the scripts and styles
function hackerminimal_scripts() {
    // The CSS reset
    wp_enqueue_style('reset', get_template_directory_uri() . '/static/css/reset.css',
        array(), '2.0');

    // The Milligram CSS framework
    wp_enqueue_style('milligram', get_template_directory_uri() . '/static/css/milligram.min.css',
        array(), '1.4.1');

    // The theme's styling
    wp_enqueue_style('hackerminimal', get_template_directory_uri() . '/style.css', 
        array('milligram'), wp_get_theme()->get('Version'));

    // The main theme JavaScript
    wp_register_script('hackerminimal', 
        get_template_directory_uri() . '/static/js/hackerminimal.js', array(),
        wp_get_theme()->get('Version'), true);
    wp_enqueue_script('hackerminimal');
}
add_action('wp_enqueue_scripts', 'hackerminimal_scripts');

/**
 * The following provides some minor security enhancements to the WordPress site.
 */

// Removes login error messages
add_filter('login_errors', create_function('$a', "return null;"));

// Don't leak the WordPress version information in the markup
remove_action('wp_head', 'wp_generator');

// Use the author nickname instead of username for author page slugs
function hackerminimal_username_to_nickname(&$errors, $update, &$user) {
    if (!empty($user->nickname)) {
        $user->user_nicename = sanitize_title($user->nickname, $user->display_name);
    }
}
add_action('user_profile_update_errors', 'hackerminimal_username_to_nickname', 10, 3);

?>
