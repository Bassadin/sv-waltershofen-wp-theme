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
}

// Remove widgets
function remove_parent_functionality()
{
    remove_action('widgets_init', 'twenty_twenty_one_widgets_init');
}
add_action('after_setup_theme', 'remove_parent_functionality');
