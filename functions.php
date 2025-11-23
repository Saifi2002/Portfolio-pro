<?php

add_action('wp_enqueue_scripts', 'portfolio_pro_enqueue_scripts');
function portfolio_pro_enqueue_scripts() {
    // Tailwind Play CDN with JIT
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), null);

    // Main theme stylesheet
    wp_enqueue_style('portfolio-pro-style', get_stylesheet_uri());

}




add_action('after_setup_theme', 'portfolio_pro_setup');
function portfolio_pro_setup() {
    add_theme_support('title-tag'); // Dynamic title
    add_theme_support('post-thumbnails'); // Featured images
    add_theme_support('custom-logo'); // Logo support
}



// Register main menu
add_action('after_setup_theme', 'portfolio_pro_menus');
function portfolio_pro_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'portfolio-pro')
    ));
}

// Register footer widget
add_action('widgets_init', 'portfolio_pro_widgets');
function portfolio_pro_widgets() {
    register_sidebar(array(
        'name'          => __('Footer Widget', 'portfolio-pro'),
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}



// Register Project CPT
add_action('init', 'portfolio_pro_register_cpt');
function portfolio_pro_register_cpt() {
    $labels = array(
        'name'               => _x('Projects', 'post type general name', 'portfolio-pro'),
        'singular_name'      => _x('Project', 'post type singular name', 'portfolio-pro'),
        'menu_name'          => _x('Projects', 'admin menu', 'portfolio-pro'),
        'name_admin_bar'     => _x('Project', 'add new on admin bar', 'portfolio-pro'),
        'add_new'            => _x('Add New', 'project', 'portfolio-pro'),
        'add_new_item'       => __('Add New Project', 'portfolio-pro'),
        'new_item'           => __('New Project', 'portfolio-pro'),
        'edit_item'          => __('Edit Project', 'portfolio-pro'),
        'view_item'          => __('View Project', 'portfolio-pro'),
        'all_items'          => __('All Projects', 'portfolio-pro'),
        'search_items'       => __('Search Projects', 'portfolio-pro'),
        'not_found'          => __('No projects found.', 'portfolio-pro'),
        'not_found_in_trash' => __('No projects found in Trash.', 'portfolio-pro')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
    );

    register_post_type('project', $args);
}


add_action('customize_register', 'portfolio_pro_customize_register');
function portfolio_pro_customize_register($wp_customize) {

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'portfolio-pro'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'portfolio-pro'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => get_bloginfo('description'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'portfolio-pro'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // About Section
    $wp_customize->add_section('about_section', array(
        'title'    => __('About Section', 'portfolio-pro'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('about_me_text', array(
        'default'           => 'Write something about yourself here.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_me_text', array(
        'label'   => __('About Me Text', 'portfolio-pro'),
        'section' => 'about_section',
        'type'    => 'textarea',
    ));

    // Footer Section
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer Section', 'portfolio-pro'),
        'priority' => 50,
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All rights reserved.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Footer Copyright', 'portfolio-pro'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

}


function portfolio_customize_register($wp_customize) {

    // Logo
    $wp_customize->add_setting('portfolio_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'portfolio_logo', [
        'label' => 'Logo Upload',
        'section' => 'title_tagline',
        'settings' => 'portfolio_logo'
    ]));

    // Hero Title
    $wp_customize->add_section('portfolio_hero_section', [
        'title' => 'Hero Section',
    ]);

    $wp_customize->add_setting('hero_title', ['default' => 'Hi, I’m Saif']);
    $wp_customize->add_control('hero_title', [
        'label' => 'Hero Title',
        'section' => 'portfolio_hero_section',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('hero_subtitle', ['default' => 'Web Developer']);
    $wp_customize->add_control('hero_subtitle', [
        'label' => 'Hero Subtitle',
        'section' => 'portfolio_hero_section',
        'type' => 'text',
    ]);
}
add_action('customize_register', 'portfolio_customize_register');



/**
 * Display current template being used
 * Add this to your theme's functions.php
 */
// add_action('wp_footer', function() {
//     if (!current_user_can('administrator')) return;
    
//     global $template;
//     $template_name = basename($template);
//     $template_path = str_replace(get_theme_root() . '/', '', $template);
    
//     echo '<div style="
//         position: fixed;
//         bottom: 0;
//         left: 0;
//         right: 0;
//         background: #1d2327;
//         color: #fff;
//         padding: 10px 15px;
//         font-family: monospace;
//         font-size: 13px;
//         z-index: 999999;
//         border-top: 3px solid #2271b1;
//     ">';
    
//     echo '<strong style="color: #72aee6;">Template:</strong> ' . $template_name . ' &nbsp;|&nbsp; ';
//     echo '<strong style="color: #72aee6;">Path:</strong> ' . $template_path . ' &nbsp;|&nbsp; ';
    
//     // Show page type
//     $type = 'Unknown';
//     if (is_front_page()) $type = 'Front Page';
//     elseif (is_home()) $type = 'Blog Home';
//     elseif (is_single()) $type = 'Single Post';
//     elseif (is_page()) $type = 'Page';
//     elseif (is_archive()) $type = 'Archive';
//     elseif (is_category()) $type = 'Category';
//     elseif (is_tag()) $type = 'Tag';
//     elseif (is_search()) $type = 'Search';
//     elseif (is_404()) $type = '404';
    
//     echo '<strong style="color: #72aee6;">Type:</strong> ' . $type;
    
//     // Show post/page ID if applicable
//     if (is_singular()) {
//         echo ' &nbsp;|&nbsp; <strong style="color: #72aee6;">ID:</strong> ' . get_the_ID();
//     }
    
//     echo '</div>';
// });
