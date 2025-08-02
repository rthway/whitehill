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
