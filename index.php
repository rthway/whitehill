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
