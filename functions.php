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

//New Menu
function register_my_menu()
{
    register_nav_menu('footer-legal-menu', __('Footer Legal Menu'));
}
add_action('init', 'register_my_menu');
