<?php get_header(); ?>
<?php echo wp_kses_post(get_theme_mod('hero_heading_text')); ?>
<?php echo wp_kses_post(get_theme_mod('hero_heading_text')); ?>

<section class="static-hero-s2">
    <div class="container-fluid">
        <div class="content">
            <h2 class="title">
                <?php echo wp_kses_post(get_theme_mod('hero_heading_text')); ?>
            </h2>
            <p>
                <?php echo esc_html(get_theme_mod('hero_paragraph')); ?>
            </p>

            <div class="hero-bottom">
                <div class="hero-btn">
                    <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#')); ?>" class="theme-btn">
                        <?php echo esc_html(get_theme_mod('hero_button_text', 'Get Started')); ?>
                        <i class="ti-arrow-right"></i>
                    </a>
                </div>

                <div class="hero-slider">
                    <?php for ($i = 1; $i <= 5; $i++) :
                        $img = get_theme_mod("hero_slider_img_$i");
                        if ($img): ?>
                    <div class="item"><img src="<?php echo esc_url($img); ?>" alt="" /></div>
                    <?php endif;
                    endfor; ?>
                </div>
            </div>
        </div>

        <div class="hero-image">
            <?php
            $word_map = array(1 =>
            'one', 2 => 'two', 3 => 'three'); for ($i = 1; $i <= 3; $i++) { $img = get_theme_mod("hero_side_img_$i"); if ($img && isset($word_map[$i])) { echo '
            <div class="image-' . esc_attr($word_map[$i]) . '">'; echo '<img src="' . esc_url($img) . '" alt="" />'; echo '</div>
            '; } } ?>
        </div>
    </div>
</section>

<style>
    .hero-slider {
        display: flex;
        overflow-x: auto; /* Optional: Enables horizontal scroll if needed */
        gap: 10px; /* Optional spacing between images */
    }

    .hero-slider .item {
        flex: 0 0 auto; /* Prevent shrinking and allow images to stay inline */
    }

    .hero-slider .item img {
        display: block;
        max-width: 100%;
        height: auto;
    }
</style>
<br />

<section class="funfact-section s2">
    <div class="container">
        <div class="row">
            <?php for ($i = 1; $i <= 4; $i++): 
                $count = get_theme_mod("funfact_count_$i", '');
                $suffix = get_theme_mod("funfact_suffix_$i", '');
                $label = get_theme_mod("funfact_label_$i", '');

                // Default values if empty (to keep your original text)
                if (!$count) {
                    // Provide default numbers same as your example
                    $default_counts = ['12', '20', '10', '32'];
                    $count = $default_counts[$i - 1];
                }
                if (!$suffix) {
                    $default_suffixes = ['K+', '+', 'K+', '+'];
                    $suffix = $default_suffixes[$i - 1];
                }
                if (!$label) {
                    $default_labels = ['Project Completed', 'Industry Experience', 'Happy Clients', 'Awards Winner'];
                    $label = $default_labels[$i - 1];
                }
            ?>
                <div class="col col-lg-3 col-md-6 col-12">
                    <div class="item">
                        <h3><span class="odometer" data-count="<?php echo esc_attr($count); ?>"></span><?php echo esc_html($suffix); ?></h3>
                        <h4><?php echo esc_html($label); ?></h4>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>




<section class="about-section-s2 section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-12">
                <div class="about-left-content">
                    <div class="image-1">
                        <img src="<?php echo esc_url(get_theme_mod('about_image_1', get_template_directory_uri() . '/assets/images/about/img-2.jpg')); ?>" alt="About Image 1">
                    </div>
                    <div class="image-2">
                        <img src="<?php echo esc_url(get_theme_mod('about_image_2', get_template_directory_uri() . '/assets/images/about/img-3.jpg')); ?>" alt="About Image 2">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="about-right-content">
                    <h2 class="title"><?php echo esc_html(get_theme_mod('about_title', 'ABOUT COMPANY')); ?></h2>
                    <h3 class="sub-title"><?php echo esc_html(get_theme_mod('about_subtitle', 'We Are Solving All of Your Business Problem')); ?></h3>
                    <p class="text"><?php echo wp_kses_post(get_theme_mod('about_text', 'Our industry\'s business policy encompasses the strategies, guidelines, and practices that technology companies use to achieve their goals and objectives. The policies may vary depending on the company\'s size, market position, and competitive landscape.')); ?></p>
                    <div class="ceo-content">
                        <h2><?php echo esc_html(get_theme_mod('about_ceo_name', 'Robert Willum')); ?></h2>
                        <span><?php echo esc_html(get_theme_mod('about_ceo_position', 'CEO & Founder of Manit')); ?></span>
                        <div class="signeture">
                            <img src="<?php echo esc_url(get_theme_mod('about_signature_image', get_template_directory_uri() . '/assets/images/about/signeture.png')); ?>" alt="Signature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- services start -->
<section class="services-section-s2 section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title">
                    <span><?php echo esc_html(get_theme_mod('whitehill_services_title', 'Our Services')); ?></span>
                    <h2><?php echo esc_html(get_theme_mod('whitehill_services_subtitle', 'Design the Concept of Your Business Idea Now')); ?></h2>
                </div>
            </div>
        </div>
        <div class="services-wrap">
            <div class="row">
                <?php for ($i = 1; $i <= 8; $i++): ?>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="services-card">
                            <div class="number-shape">
                                <span><?php echo sprintf('%02d', $i); ?></span>
                                <div class="shape">
                                    <svg viewBox="0 0 112 107" fill="none">
                                        <path d="M67.9706 0.555039C89.2118 -0.484865 110.489 16.3952 111.529 37.6365C112.568 58.8777 92.9541 105.645 71.7129 106.685C50.4716 107.725 1.72311 63.4921 0.683209 42.2509C-0.356694 21.0097 46.7293 1.59494 67.9706 0.555039Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="icon">
                                <img src="<?php echo esc_url(get_theme_mod("whitehill_service_icon_$i")); ?>" alt="">
                            </div>
                            <h2><?php echo esc_html(get_theme_mod("whitehill_service_title_$i")); ?></h2>
                            <span><?php echo esc_html(get_theme_mod("whitehill_service_desc_$i")); ?></span>
                            <h3>
                                <a href="<?php echo esc_url(get_theme_mod("whitehill_service_link_$i")); ?>">
                                    <span>Learn More</span>
                                    <i class="ti-arrow-right"></i>
                                </a>
                            </h3>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>





<!-- project start -->
<section class="project-section-s2 section-padding">
    <div class="container">
        <div class="section-title">
            <div class="row justify-content-center">
                <div class="col-12">
                    <span>Recent Projects</span>
                    <h2>Our Latest Projects</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => 5, // or -1 for all
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();
                    $tagline = get_post_meta(get_the_ID(), 'tagline', true);
                    $link = get_post_meta(get_the_ID(), 'link', true);
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if (!$thumbnail_url) {
                        $thumbnail_url = get_template_directory_uri() . '/assets/images/project/placeholder.jpg';
                    }
                    if (!$link) {
                        $link = get_permalink();
                    }
            ?>
            <div class="col-md-4">
                <div class="project-card">
                    <div class="image">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html($tagline ?: 'Development / Idea'); ?></span>
                        <h2><?php the_title(); ?></h2>
                        <a href="<?php echo esc_url($link); ?>" class="project-link">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project/icon-arrow.svg" alt="">
                            </div>
                            <div class="shape">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project/icon-bg.svg" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else: ?>
                <p>No projects found.</p>
            <?php endif; ?>
            <!-- 6th Static Card: All Projects Link -->
            <div class="col-md-4">
                <div class="project-card">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project/all-projects.jpg" alt="All Projects">
                    </div>
                    <div class="content">
                        <span>Explore</span>
                        <h2>All Projects</h2>
                        <a href="<?php echo site_url('/portfolio'); ?>" class="project-link">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project/icon-arrow.svg" alt="">
                            </div>
                            <div class="shape">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project/icon-bg.svg" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

