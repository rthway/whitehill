<?php
/**
 * Template Name: Blog Page
 */
get_header(); ?>
<!-- blog start -->
<!-- blog start -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="section-title">
            <div class="row justify-content-center">
                <div class="col-12">
                    <span><?php echo esc_html__('Recent Article', 'whitehill'); ?></span>
                    <h2><?php echo esc_html__('Our Latest Article', 'whitehill'); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $blog_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 6, // Adjust how many posts per page
                'paged'          => $paged,
                'post_status'    => 'publish'
            ));

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="blog-card">
                            <div class="image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('full'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) : ?>
                                    <span><?php echo esc_html($categories[0]->name); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <ul class="date">
                                    <li><?php echo get_the_date('M d, Y'); ?></li>
                                    <li><?php the_author(); ?></li>
                                </ul>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="link">
                                    <a href="<?php the_permalink(); ?>"><span><?php echo esc_html__('Continue Reading', 'whitehill'); ?></span>
                                        <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12 text-center">
                <div class="pagination-wrap">
                    <?php
                    echo paginate_links(array(
                        'total'   => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('« Prev', 'whitehill'),
                        'next_text' => __('Next »', 'whitehill'),
                    ));
                    ?>
                </div>
            </div>
        </div>

        <?php
                wp_reset_postdata();
            else : ?>
            <p><?php esc_html_e('No posts found.', 'whitehill'); ?></p>
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>
