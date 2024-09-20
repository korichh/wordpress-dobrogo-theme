<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

if ('disable_gutenberg') {
    add_filter('use_block_editor_for_post_type', '__return_false', 100);
}

function dobrogo_scripts()
{
    wp_enqueue_style('dobrogo-vendor', get_template_directory_uri() . '/assets/css/vendor.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('dobrogo-options', get_template_directory_uri() . '/assets/css/options.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('dobrogo-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('dobrogo-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION, 'all');

    wp_enqueue_script('dobrogo-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array(), _S_VERSION, true);
    wp_enqueue_script('dobrogo-main', get_template_directory_uri() . '/assets/js/main.js', array('dobrogo-vendor'), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'dobrogo_scripts');

function dobrogo_admin_scripts()
{
    wp_enqueue_style('dobrogo-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), _S_VERSION, 'all');
}
add_action('admin_enqueue_scripts', 'dobrogo_admin_scripts');

function dobrogo_init()
{
    register_nav_menus(
        array(
            'header-menu' => esc_html__('Header menu', 'dobrogo'),
        )
    );

    register_post_type('reports', [
        'label'  => null,
        'labels' => [
            'name'               => __('Reports', 'dobrogo'),
            'singular_name'      => __('Report', 'dobrogo'),
            'add_new'            => __('Add report', 'dobrogo'),
            'add_new_item'       => __('Adding report', 'dobrogo'),
            'edit_item'          => __('Edit report', 'dobrogo'),
            'new_item'           => __('New report', 'dobrogo'),
            'view_item'          => __('See report', 'dobrogo'),
            'search_items'       => __('Search report', 'dobrogo'),
            'not_found'          => __('Reports not found', 'dobrogo'),
            'not_found_in_trash' => __('Reports not found in trash', 'dobrogo'),
            'parent_item_colon'  => '',
            'all_items'          => __('All reports', 'dobrogo'),
            'menu_name'          => __('Reports', 'dobrogo')
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-list-view',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions', 'page-attributes', 'post-formats'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ]);

    register_post_type('news', [
        'label'  => null,
        'labels' => [
            'name'               => __('News', 'dobrogo'),
            'singular_name'      => __('News', 'dobrogo'),
            'add_new'            => __('Add news', 'dobrogo'),
            'add_new_item'       => __('Adding news', 'dobrogo'),
            'edit_item'          => __('Edit news', 'dobrogo'),
            'new_item'           => __('New news', 'dobrogo'),
            'view_item'          => __('See news', 'dobrogo'),
            'search_items'       => __('Search news', 'dobrogo'),
            'not_found'          => __('News not found', 'dobrogo'),
            'not_found_in_trash' => __('News not found in trash', 'dobrogo'),
            'parent_item_colon'  => '',
            'all_items'          => __('All news', 'dobrogo'),
            'menu_name'          => __('News', 'dobrogo')
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-clipboard',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions', 'page-attributes', 'post-formats'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
        'publicly_queryable'  => true,
    ]);

    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = __('Orders', 'dobrogo');
    $labels->singular_name = __('Order', 'dobrogo');
    $labels->add_new = __('Add order', 'dobrogo');
    $labels->add_new_item = __('Adding order', 'dobrogo');
    $labels->edit_item = __('Edit order', 'dobrogo');
    $labels->new_item = __('New order', 'dobrogo');
    $labels->view_item = __('See order', 'dobrogo');
    $labels->search_items = __('Search order', 'dobrogo');
    $labels->not_found = __('Orders not found', 'dobrogo');
    $labels->not_found_in_trash = __('Orders not found in trash', 'dobrogo');
    $labels->all_items = __('All orders', 'dobrogo');
    $labels->menu_name = __('Orders', 'dobrogo');
    $labels->name_admin_bar = __('Orders', 'dobrogo');
    // $get_post_type->menu_icon = 'dashicons-format-aside';
}
add_action('init', 'dobrogo_init');

function dobrogo_setup()
{
    load_theme_textdomain('dobrogo', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support(
        'custom-background',
        apply_filters(
            'dobrogo_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'dobrogo_setup');

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';
