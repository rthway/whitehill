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

<!-- funfact start -->
<section class="funfact-section s2">
    <div class="container">
        <div class="row">
            <div class="col col-lg-3 col-md-6 col-12">
                <div class="item">
                    <h3><span class="odometer" data-count="12"></span>K+</h3>
                    <h4>Project Completed</h4>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-12">
                <div class="item">
                    <h3><span class="odometer" data-count="20"></span>+</h3>
                    <h4>Industry Experience</h4>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-12">
                <div class="item">
                    <h3><span class="odometer" data-count="10"></span>K+</h3>
                    <h4>Happy Clients</h4>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-12">
                <div class="item">
                    <h3><span class="odometer" data-count="32"></span>+</h3>
                    <h4>Awards Winner</h4>
                </div>
            </div>
        </div>
    </div>
</section>
