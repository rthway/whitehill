<?php
/* Template Name: All Projects */
get_header();
?>

<section class="project-section-s2 section-padding">
    <div class="container">
        <div class="section-title">
            <div class="row justify-content-center">
                <div class="col-12">
                    <span>Portfolio</span>
                    <h2>All Projects Portfolio</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => -1 // show all
            );
            $projects = new WP_Query($args);
            if ($projects->have_posts()):
                while ($projects->have_posts()): $projects->the_post();
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
            <div class="col-md-4 mb-4">
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
        </div>
    </div>
</section>

<?php get_footer(); ?>
