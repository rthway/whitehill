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



function funfact_customize_register($wp_customize) {
    $wp_customize->add_section('funfact_section', [
        'title'    => __('Funfact Settings', 'your-textdomain'),
        'priority' => 30,
    ]);

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("funfact_count_$i", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_setting("funfact_suffix_$i", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_setting("funfact_label_$i", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("funfact_count_$i", [
            'label'    => __("Funfact #$i Number (data-count)", 'your-textdomain'),
            'section'  => 'funfact_section',
            'type'     => 'text',
        ]);
        $wp_customize->add_control("funfact_suffix_$i", [
            'label'    => __("Funfact #$i Number suffix (e.g. K+, +)", 'your-textdomain'),
            'section'  => 'funfact_section',
            'type'     => 'text',
        ]);
        $wp_customize->add_control("funfact_label_$i", [
            'label'    => __("Funfact #$i Label (h4 text)", 'your-textdomain'),
            'section'  => 'funfact_section',
            'type'     => 'text',
        ]);
    }
}
add_action('customize_register', 'funfact_customize_register');







function whitehill_customize_register_about_section($wp_customize) {

    // Section for About
    $wp_customize->add_section('about_section', [
        'title' => __('About Section', 'whitehill'),
        'priority' => 30,
        'description' => __('Customize the About Section content', 'whitehill'),
    ]);

    // Left images
    $wp_customize->add_setting('about_image_1', [
        'default' => get_template_directory_uri() . '/assets/images/about/img-2.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_1', [
        'label' => __('About Image 1', 'whitehill'),
        'section' => 'about_section',
        'settings' => 'about_image_1',
    ]));

    $wp_customize->add_setting('about_image_2', [
        'default' => get_template_directory_uri() . '/assets/images/about/img-3.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_2', [
        'label' => __('About Image 2', 'whitehill'),
        'section' => 'about_section',
        'settings' => 'about_image_2',
    ]));

    // Title
    $wp_customize->add_setting('about_title', [
        'default' => 'ABOUT COMPANY',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('about_title', [
        'label' => __('About Title', 'whitehill'),
        'section' => 'about_section',
        'type' => 'text',
    ]);

    // Subtitle
    $wp_customize->add_setting('about_subtitle', [
        'default' => 'We Are Solving All of Your Business Problem',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('about_subtitle', [
        'label' => __('About Subtitle', 'whitehill'),
        'section' => 'about_section',
        'type' => 'text',
    ]);

    // Paragraph text
    $wp_customize->add_setting('about_text', [
        'default' => 'Our industry\'s business policy encompasses the strategies, guidelines, and practices that technology companies use to achieve their goals and objectives. The policies may vary depending on the company\'s size, market position, and competitive landscape.',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('about_text', [
        'label' => __('About Paragraph Text', 'whitehill'),
        'section' => 'about_section',
        'type' => 'textarea',
    ]);

    // CEO Name
    $wp_customize->add_setting('about_ceo_name', [
        'default' => 'Robert Willum',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('about_ceo_name', [
        'label' => __('CEO Name', 'whitehill'),
        'section' => 'about_section',
        'type' => 'text',
    ]);

    // CEO Position
    $wp_customize->add_setting('about_ceo_position', [
        'default' => 'CEO & Founder of Manit',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('about_ceo_position', [
        'label' => __('CEO Position', 'whitehill'),
        'section' => 'about_section',
        'type' => 'text',
    ]);

    // Signature Image
    $wp_customize->add_setting('about_signature_image', [
        'default' => get_template_directory_uri() . '/assets/images/about/signeture.png',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_signature_image', [
        'label' => __('Signature Image', 'whitehill'),
        'section' => 'about_section',
        'settings' => 'about_signature_image',
    ]));
}
add_action('customize_register', 'whitehill_customize_register_about_section');









function whitehill_customize_service_register($wp_customize) {
    // Services Section
    $wp_customize->add_section('whitehill_services_section', array(
        'title' => __('Services Section', 'whitehill'),
        'priority' => 30,
    ));

    // Title & Subtitle
    $wp_customize->add_setting('whitehill_services_title', array('default' => 'Our Services'));
    $wp_customize->add_control('whitehill_services_title', array(
        'label' => __('Section Title', 'whitehill'),
        'section' => 'whitehill_services_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('whitehill_services_subtitle', array('default' => 'Design the Concept of Your Business Idea Now'));
    $wp_customize->add_control('whitehill_services_subtitle', array(
        'label' => __('Section Subtitle', 'whitehill'),
        'section' => 'whitehill_services_section',
        'type' => 'text',
    ));

    // Loop for 8 services
    for ($i = 1; $i <= 8; $i++) {
        // Icon
        $wp_customize->add_setting("whitehill_service_icon_$i");
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "whitehill_service_icon_$i", array(
            'label' => __("Service $i Icon", 'whitehill'),
            'section' => 'whitehill_services_section',
        )));

        // Title
        $wp_customize->add_setting("whitehill_service_title_$i", array('default' => "Service Title $i"));
        $wp_customize->add_control("whitehill_service_title_$i", array(
            'label' => __("Service $i Title", 'whitehill'),
            'section' => 'whitehill_services_section',
            'type' => 'text',
        ));

        // Description
        $wp_customize->add_setting("whitehill_service_desc_$i", array('default' => "Short description for service $i."));
        $wp_customize->add_control("whitehill_service_desc_$i", array(
            'label' => __("Service $i Description", 'whitehill'),
            'section' => 'whitehill_services_section',
            'type' => 'textarea',
        ));

        // Link
        $wp_customize->add_setting("whitehill_service_link_$i", array('default' => '#'));
        $wp_customize->add_control("whitehill_service_link_$i", array(
            'label' => __("Service $i Link", 'whitehill'),
            'section' => 'whitehill_services_section',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'whitehill_customize_service_register');






function whitehill_register_project_cpt() {
    register_post_type('project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true, // for block editor/meta UI
    ));

    // Register meta fields
    register_post_meta('project', 'tagline', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        },
    ));

    register_post_meta('project', 'link', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        },
    ));
}
add_action('init', 'whitehill_register_project_cpt');



function whitehill_project_meta_boxes() {
    add_meta_box('whitehill_project_fields', 'Project Details', 'whitehill_project_fields_callback', 'project', 'normal', 'high');
}
add_action('add_meta_boxes', 'whitehill_project_meta_boxes');

function whitehill_project_fields_callback($post) {
    $tagline = get_post_meta($post->ID, 'tagline', true);
    $link = get_post_meta($post->ID, 'link', true);
    wp_nonce_field('whitehill_project_fields_nonce', 'whitehill_project_nonce');
    ?>
    <p>
        <label for="whitehill_tagline"><strong>Tagline:</strong></label><br>
        <input type="text" name="whitehill_tagline" id="whitehill_tagline" value="<?php echo esc_attr($tagline); ?>" style="width:100%;">
    </p>
    <p>
        <label for="whitehill_link"><strong>Project Link (URL):</strong></label><br>
        <input type="url" name="whitehill_link" id="whitehill_link" value="<?php echo esc_url($link); ?>" style="width:100%;">
    </p>
    <?php
}

function whitehill_save_project_meta($post_id) {
    if (!isset($_POST['whitehill_project_nonce']) || !wp_verify_nonce($_POST['whitehill_project_nonce'], 'whitehill_project_fields_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['whitehill_tagline'])) {
        update_post_meta($post_id, 'tagline', sanitize_text_field($_POST['whitehill_tagline']));
    }
    if (isset($_POST['whitehill_link'])) {
        update_post_meta($post_id, 'link', esc_url_raw($_POST['whitehill_link']));
    }
}
add_action('save_post', 'whitehill_save_project_meta');
