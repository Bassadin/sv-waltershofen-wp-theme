<?php
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', PHP_INT_MAX);
function my_theme_enqueue_styles()
{
    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('google-fonts', "https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap");
}

// Remove widgets
function remove_parent_functionality()
{
    remove_action('widgets_init', 'twenty_twenty_one_widgets_init');
}
add_action('after_setup_theme', 'remove_parent_functionality');

//Meta tags
function twentytwentyone_add_meta_tags()
{
    // theme color
    echo '<meta name="theme-color" content="#1b84b5" />' . "\n";
}
add_action('wp_head', 'twentytwentyone_add_meta_tags');

//New Menu
function register_my_menu()
{
    register_nav_menu('footer-legal-menu', __('Footer Legal Menu'));
}
add_action('init', 'register_my_menu');
