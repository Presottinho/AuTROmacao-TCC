<?php
function pageTitle(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'pageTitle');

function styleImplementation(){
  wp_enqueue_style('theme-style', 
                    get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'styleImplementation');

function javascriptImplementation(){
  wp_enqueue_script('main-script', 
                    get_template_directory_uri() . '/js/main.js', 
                    NULL, 
                    '1.0', 
                    true );
}
add_action('wp_enqueue_scripts', 'javascriptImplementation');

function dropdownAnimation() {
  wp_enqueue_script(
    'dropdown-menu', 
    get_template_directory_uri() . '/js/dropdown-menu.js', 
    array(), 
    false,   
    true    
  );
}
add_action('wp_enqueue_scripts', 'dropdownAnimation');


function headerMenu(){
  register_nav_menus(array('header-menu' => __('Header Menu')));
}
add_action('init', 'headerMenu');

function footerMenu() {
    register_nav_menus(array('footer-menu' => __('Footer Menu')));
}
add_action('init', 'footerMenu');

function themeToggleScript() {
  wp_enqueue_script(
    'theme-toggle',
    get_template_directory_uri() . '/js/theme-toggle.js',
    array(),
    false,
    true
  );
}
add_action('wp_enqueue_scripts', 'themeToggleScript');

add_filter('show_admin_bar', '__return_false');

function enqueue_filter_posts_script() {
  wp_enqueue_script(
    'filter-posts',
    get_template_directory_uri() . '/js/filter-posts.js',
    array(), // ou ['jquery'] se preferir jQuery
    '1.0',
    true
  );
}
add_action('wp_enqueue_scripts', 'enqueue_filter_posts_script');