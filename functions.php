<?php
// Exit if accessed directly
if ( !defined('ABSPATH') ) {
    exit;
}

/**
 * Theme Setup
 */
function whitehill_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'whitehill'),
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Enable support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'whitehill_theme_setup');


/**
 * Enqueue Styles and Scripts
 */
function whitehill_enqueue_assets() {
    $theme_uri = get_template_directory_uri();

    // Enqueue CSS styles
    wp_enqueue_style('whitehill-themify-icons', $theme_uri . '/assets/css/themify-icons.css');
    wp_enqueue_style('whitehill-flaticon', $theme_uri . '/assets/css/flaticon.css');
    wp_enqueue_style('whitehill-bootstrap', $theme_uri . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('whitehill-animate', $theme_uri . '/assets/css/animate.css');
    wp_enqueue_style('whitehill-owl-carousel', $theme_uri . '/assets/css/owl.carousel.css');
    wp_enqueue_style('whitehill-owl-theme', $theme_uri . '/assets/css/owl.theme.css');
    wp_enqueue_style('whitehill-slick', $theme_uri . '/assets/css/slick.css');
    wp_enqueue_style('whitehill-slick-theme', $theme_uri . '/assets/css/slick-theme.css');
    wp_enqueue_style('whitehill-swiper', $theme_uri . '/assets/css/swiper.min.css');
    wp_enqueue_style('whitehill-owl-transitions', $theme_uri . '/assets/css/owl.transitions.css');
    wp_enqueue_style('whitehill-nice-select', $theme_uri . '/assets/css/nice-select.css');
    wp_enqueue_style('whitehill-fancybox', $theme_uri . '/assets/css/jquery.fancybox.css');
    wp_enqueue_style('whitehill-odometer-theme', $theme_uri . '/assets/css/odometer-theme-default.css');
    wp_enqueue_style('whitehill-main-style', $theme_uri . '/assets/sass/style.css');

    // Enqueue JavaScript files
    wp_enqueue_script('whitehill-jquery', $theme_uri . '/assets/js/jquery.min.js', array(), null, true);
    wp_enqueue_script('whitehill-bootstrap', $theme_uri . '/assets/js/bootstrap.bundle.min.js', array('whitehill-jquery'), null, true);
    wp_enqueue_script('whitehill-modernizr', $theme_uri . '/assets/js/modernizr.custom.js', array(), null, false); // Load in <head>
    wp_enqueue_script('whitehill-plugins', $theme_uri . '/assets/js/jquery-plugin-collection.js', array('whitehill-jquery'), null, true);
    wp_enqueue_script('whitehill-main', $theme_uri . '/assets/js/script.js', array('whitehill-jquery'), null, true);

}
add_action('wp_enqueue_scripts', 'whitehill_enqueue_assets');





function whitehill_customize_register_hero($wp_customize) {

    // Section
    $wp_customize->add_section('static_hero_section', array(
        'title'    => __('Static Hero Section', 'whitehill'),
        'priority' => 30,
    ));

    // Heading Title
    $wp_customize->add_setting('hero_heading_text', array(
        'default'   => 'We Are The <span class="text-bg1">Perfect</span> <span class="text-bg2">Solution</span> For Your Project',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('hero_heading_text', array(
        'label'   => __('Hero Heading', 'whitehill'),
        'section' => 'static_hero_section',
        'type'    => 'textarea',
    ));

    // Paragraph Text
    $wp_customize->add_setting('hero_paragraph', array(
        'default' => 'Creating an agency is a long-term commitment...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_paragraph', array(
        'label'   => __('Hero Paragraph', 'whitehill'),
        'section' => 'static_hero_section',
        'type'    => 'textarea',
    ));

    // Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Get Started',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_text', array(
        'label'   => __('Button Text', 'whitehill'),
        'section' => 'static_hero_section',
        'type'    => 'text',
    ));

    // Button URL
    $wp_customize->add_setting('hero_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_button_url', array(
        'label'   => __('Button URL', 'whitehill'),
        'section' => 'static_hero_section',
        'type'    => 'url',
    ));

    // Hero Slider Images (Repeatable)
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("hero_slider_img_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_slider_img_$i", array(
            'label'   => __("Slider Image $i", 'whitehill'),
            'section' => 'static_hero_section',
        )));
    }

    // Hero Side Images
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("hero_side_img_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_side_img_$i", array(
            'label'   => __("Side Image $i", 'whitehill'),
            'section' => 'static_hero_section',
        )));
    }
}
add_action('customize_register', 'whitehill_customize_register_hero');
