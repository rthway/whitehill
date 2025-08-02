<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Meta Tags -->
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon">

    <!-- WordPress Head -->
    <?php wp_head(); ?>
</head>


<?php
/**
 * The header for the theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Start header -->
<header id="header">
    <div class="wpo-site-header s2">
        <nav class="navigation navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Mobile Menu Button -->
                    <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                        <div class="mobail-menu">
                            <button type="button" class="navbar-toggler open-btn" data-bs-toggle="collapse" data-bs-target="#navbar">
                                <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'your-theme-textdomain' ); ?></span>
                                <span class="icon-bar first-angle"></span>
                                <span class="icon-bar middle-angle"></span>
                                <span class="icon-bar last-angle"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Logo -->
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php
                                if ( has_custom_logo() ) {
                                    the_custom_logo();
                                } else {
                                    bloginfo('name');
                                }
                                ?>
                            </a>
                        </div>
                    </div>

                    

                    <!-- Navigation Menu -->
                    <div class="col-lg-7 col-md-1 col-1">
                        <div id="navbar" class="collapse navbar-collapse navigation-holder">
                            <button class="menu-close"><i class="ti-close"></i></button>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container'      => false,
                                'menu_class'     => 'nav navbar-nav mb-2 mb-lg-0',
                                'fallback_cb'    => 'whitehill_menu_fallback',
                            ));
                            ?>
                        </div>
                    </div>
                    <!-- Header Right -->
                    <div class="col-lg-3 col-md-2 col-2">
                        <div class="header-right">
                            <div class="login">
                                <a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e('Login', 'your-theme-textdomain'); ?></a>
                            </div>
                            <div class="close-form">
                                <!-- <a class="theme-btn" href="<?php echo esc_url( home_url('/contact') ); ?>"><?php esc_html_e('Start Free Trial', 'your-theme-textdomain'); ?></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of container -->
        </nav>
    </div>
</header>
<!-- end of header -->
