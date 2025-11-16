<?php
    function fodas(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme','fodas');

    function meus_temas(){
        wp_enqueue_style('theme-style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts','meus_temas');